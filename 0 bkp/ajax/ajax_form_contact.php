<?php
require_once "../core/MasterPDO.php";

$db = new MasterPDO();

$ip = $_SERVER['REMOTE_ADDR']; // Esto contendrá la ip de la solicitud.
// Puedes usar un método más sofisticado para recuperar el contenido de una página web con PHP usando una biblioteca o algo así
// Vamos a recuperar los datos rápidamente con file_get_contents
$dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
//var_dump($dataArray);
$pais=$dataArray->geoplugin_countryName;

if (empty($pais)) {
  $pais='Mexico';
}

$origen=$ip.' - '.$pais;

$seccion = $_REQUEST['seccion']; //input nombre "txt_name"
$name = $_REQUEST['txt_name']; //input nombre "txt_name"
$email = $_REQUEST['txt_email']; //input nombre "txt_email"
$subject = $_REQUEST['txt_subject']; //input nombre "txt_subject"
$company = $_REQUEST['txt_company']; //seleccion nombre "txt_company"
$sucursal = isset($_REQUEST['txt_sucursal']) ? $_REQUEST['txt_sucursal'] : ''; //seleccion nombre "txt_company"
$phone = $_REQUEST['txt_phone']; //seleccion nombre "txt_phone"
$city = $_REQUEST['txt_city']; //input nombre "txt_city"
$message = $_REQUEST['txt_message']; //seleccion nombre "txt_message"

//Preparamos un arreglo que es el que contendrá toda la información
$json = array();

if (empty($name)) {
  $errorMsg[] = "Ingrese nombre de usuario"; //Compruebe input nombre de usuario no vacío
} else if (empty($email)) {
  $errorMsg[] = "Ingrese email"; //Revisar email input no vacio
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errorMsg[] = "Ingrese email valido"; //Verificar formato de email
} else if (empty($subject)) {
  $errorMsg[] = "Ingrese el asunto"; //Revisar password vacio o nulo
} else if (empty($company)) {
  $errorMsg[] = "Ingrese su empresa o representante"; //Revisar etiqueta select vacio
} else if (empty($phone)) {
  $errorMsg[] = "Ingrese su teléfono"; //Revisar etiqueta select vacio
} else if (empty($city)) {
  $errorMsg[] = "Ingrese su ciudad"; //Revisar etiqueta select vacio
} else if (empty($message)) {
  $errorMsg[] = "Ingrese su mensaje"; //Revisar etiqueta select vacio
} else if(strlen($message) < 20){
  $errorMsg[] = "Minimo 20 caracteres en el mensaje";	//Revisar password 6 caracteres
}
else {
  try
  {
      if (!isset($errorMsg)) {

        if ($seccion=='ticket') {
            $folio = $db->count('tickets','');
            $folio +=1;

            $data = ["folio" => $folio, "cliente" => $name,"sucursal" => $sucursal, "email" => $email, "tipo_servicio" => $subject, "empresa" => $company, "telefono" => $phone, "ciudad" => $city, "mensaje" => $message, "pais" => $pais, "ip_address" => $ip];

             //    var_dump($data);
            $insert_stmt = $db->insert('tickets', $data);

            $seccion='Nuevo Ticket de Servicio WEB';
            $mail_addAddress="atencionclientes@seguridadprotege.com";//correo electronico que recibira el mensaje
            $mail_send=1;
        }
        else{
          $data = ["seccion" => $seccion, "nombre" => $name, "email" => $email, "asunto" => $subject, "empresa_persona" => $company, "telefono" => $phone, "ciudad" => $city, "mensaje" => $message, "pais" => $pais, "ip_address" => $ip];

           //    var_dump($data);
           $insert_stmt = $db->insert('contactos', $data);

           /*Inicio captura de datos enviados por $_POST para enviar el correo */
           if ($seccion=='ventas') {
               $seccion='Cotización Nueva';
               $mail_addAddress="gerencia@seguridadprotege.com";//correo electronico que recibira el mensaje
           }
            else{
                $seccion='Contacto Nuevo';
                $mail_addAddress="info@seguridadprotege.com";//correo electronico que recibira el mensaje
            }
             $mail_send=0;
        }

          if ($insert_stmt == true) {
            /*Configuracion de variables para enviar el correo*/
            
            $mail_addName="Seguridad Protege";//correo electronico que recibira el mensaje
            $template="../core/functions/email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
            $template_ticket="../core/functions/ticket_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
            
            

            $mail_setFromEmail=$email;
            $mail_setFromName=$name;
            $txt_message=$message;
            $mail_subject=$seccion;
            $mail_subject_client=$subject;
            include("../core/functions/sendemail.php");

            if($mail_send==1){
              $numeroConCeros = str_pad($folio, 6, "0", STR_PAD_LEFT);
              sendemail_ticket($mail_setFromEmail,$mail_setFromName,$mail_addAddress,$mail_addName,$txt_message,$mail_subject,$mail_subject_client,$phone,$company,$sucursal,$city,$numeroConCeros,$origen,$template_ticket);//Enviar el mensaje
              sendemail_ticket_client($mail_setFromEmail,$mail_setFromName,$mail_addAddress,$mail_addName,$txt_message,$mail_subject,$mail_subject_client,$phone,$company,$sucursal,$city,$numeroConCeros,$template_ticket);//Enviar el mensaje
            }
            else{
              sendemail($mail_setFromEmail,$mail_setFromName,$mail_addAddress,$mail_addName,$txt_message,$mail_subject,$mail_subject_client,$phone,$company,$city,$origen,$template);//Enviar el mensaje
              sendemail_client($mail_setFromEmail,$mail_setFromName,$mail_addAddress,$mail_addName,$txt_message,$mail_subject,$mail_subject_client,$phone,$company,$city,$template);//Enviar el mensaje
            }
			
            $registerMsg = "Su mansaje fue entregado, Gracias por contactarnos"; //Ejecuta consultas            
          }
      }
  } catch (PDOException $e) {
      echo $e->getMessage();
  }
}

if (isset($errorMsg)) {
  //Si hay datos entonces retornas que se guardó la lista
  $json['success'] = false;
  foreach ($errorMsg as $error) {
    $json['message'] =  '<strong>MENSAJE INCORRECTO!</strong> <br>'.$error.'</div>';
  }
}
if (isset($registerMsg)) {
  //Si hay datos entonces retornas que se guardó la lista
  $json['success'] = true;
  $json['message'] = '<strong>MENSAJE EXITOSO!</strong> <br>'.$registerMsg.'</div>';
}

//Retornamos el nuestro arreglo en formato JSON, recuerda agregar el encabezado, es indispensable para el navegador
//Saber que tipo de información estas enviando
header('Content-Type: application/json');
echo json_encode( $json );
?>