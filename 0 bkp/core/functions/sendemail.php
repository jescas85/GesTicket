<?php

function sendemail($mail_setFromEmail,$mail_setFromName,$mail_addAddress,$mail_addName,$txt_message,$mail_subject,$mail_subject_client,$phone,$company,$city,$origen,$template){
	require_once '../core/phpmailer/class.phpmailer.php';
	$mail = new PHPMailer;                         // Puerto TCP  para conectarse 
	$mail->setFrom($mail_setFromEmail, $mail_setFromName);//Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
	$mail->addReplyTo($mail_setFromEmail, $mail_setFromName);//Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
	$mail->addAddress($mail_addAddress,$mail_addName);   // Agregar quien recibe el e-mail enviado
	$mail->addBCC('info@seguridadprotege.com');//copia oculta
	$title ='Nuevo mensaje de contacto en la pagina web de Seguridad Protege, a continuaci&oacute;n el mensaje:';
	$message = file_get_contents($template);
	$message = str_replace('{{title}}', utf8_decode($title), $message);
	$message = str_replace('{{interes}}', utf8_decode($mail_subject_client), $message);
	$message = str_replace('{{first_name}}', utf8_decode($mail_setFromName), $message);
	$message = str_replace('{{customer_email}}', utf8_decode($mail_setFromEmail), $message);
	$message = str_replace('{{message}}', utf8_decode($txt_message), $message);	
	$message = str_replace('{{subject}}', utf8_decode($mail_subject), $message);
	$message = str_replace('{{phone}}', utf8_decode($phone), $message);
	$message = str_replace('{{company}}', utf8_decode($company), $message);
	$message = str_replace('{{city}}', utf8_decode($city), $message);
	$message = str_replace('{{origin}}', '<label for="origin">Ubicaci&oacute;n: </label>'.utf8_decode($origen), $message);
	$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
	
	$mail->Subject = utf8_decode($mail_subject);
	$mail->msgHTML($message);
	$mail->send();
}

function sendemail_client($mail_setFromEmail,$mail_setFromName,$mail_addAddress,$mail_addName,$txt_message,$mail_subject,$mail_subject_client,$phone,$company,$city,$template){
	require_once '../core/phpmailer/class.phpmailer.php';
	$mail = new PHPMailer;                         // Puerto TCP  para conectarse 
	$mail->setFrom($mail_addAddress,$mail_addName);//Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
	$mail->addReplyTo($mail_addAddress,$mail_addName);//Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
	$mail->addAddress($mail_setFromEmail, $mail_setFromName);   // Agregar quien recibe el e-mail enviado
	$title ='Hemos recibido tu mensaje y te responderemos a la brevedad posible:';
	$message = file_get_contents($template);	
	$message = str_replace('{{title}}', utf8_decode($title), $message);
	$message = str_replace('{{interes}}', utf8_decode($mail_subject_client), $message);
	$message = str_replace('{{first_name}}', utf8_decode($mail_setFromName), $message);
	$message = str_replace('{{customer_email}}', utf8_decode($mail_setFromEmail), $message);
	$message = str_replace('{{message}}', utf8_decode($txt_message), $message);	
	$message = str_replace('{{subject}}', utf8_decode($mail_subject), $message);
	$message = str_replace('{{phone}}', utf8_decode($phone), $message);
	$message = str_replace('{{company}}', utf8_decode($company), $message);
	$message = str_replace('{{city}}', utf8_decode($city), $message);
	$message = str_replace('{{origin}}', '', $message);
	$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
	
	$mail->Subject = utf8_decode($mail_subject);
	$mail->msgHTML($message);
	$mail->send();
}

function sendemail_ticket($mail_setFromEmail,$mail_setFromName,$mail_addAddress,$mail_addName,$txt_message,$mail_subject,$mail_subject_client,$phone,$company,$sucursal,$city,$folio,$origen,$template){
	require_once '../core/phpmailer/class.phpmailer.php';
	$mail = new PHPMailer;                         // Puerto TCP  para conectarse 
	$mail->setFrom($mail_setFromEmail, $mail_setFromName);//Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
	$mail->addReplyTo($mail_setFromEmail, $mail_setFromName);//Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
	$mail->addAddress($mail_addAddress,$mail_addName);   // Agregar quien recibe el e-mail enviado
	$mail->addBCC('info@seguridadprotege.com');//copia oculta
	$title ='Se ha creado un nuevo Ticket de Servicio desde la Página Web de Protege:';
	$message = file_get_contents($template);	
	$message = str_replace('{{title}}', utf8_decode($title), $message);
	$message = str_replace('{{interes}}', utf8_decode($mail_subject_client), $message);
	$message = str_replace('{{first_name}}', utf8_decode($mail_setFromName), $message);
	$message = str_replace('{{folio}}', utf8_decode($folio), $message);
	$message = str_replace('{{customer_email}}', utf8_decode($mail_setFromEmail), $message);
	$message = str_replace('{{message}}', utf8_decode($txt_message), $message);	
	$message = str_replace('{{subject}}', utf8_decode($mail_subject), $message);
	$message = str_replace('{{phone}}', utf8_decode($phone), $message);
	$message = str_replace('{{company}}', utf8_decode($company), $message);
	$message = str_replace('{{sucursal}}', utf8_decode($sucursal), $message);
	$message = str_replace('{{city}}', utf8_decode($city), $message);
	$message = str_replace('{{origin}}', '<label for="origin">Ubicaci&oacute;n: </label>'.utf8_decode($origen), $message);
	$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
	//$mail->Body    = '<img src="https://townsquare.media/site/366/files/2015/03/Jimi-Hendrix-Eddie-Van-Halen-Tony-Iommi-Dimebag-Darrell.jpg">';
	
	$mail->Subject = utf8_decode($mail_subject);
	$mail->msgHTML($message);
	$mail->send();
}

function sendemail_ticket_client($mail_setFromEmail,$mail_setFromName,$mail_addAddress,$mail_addName,$txt_message,$mail_subject,$mail_subject_client,$phone,$company,$sucursal,$city,$folio,$template){
	require_once '../core/phpmailer/class.phpmailer.php';
	$mail = new PHPMailer;                         // Puerto TCP  para conectarse 
	$mail->setFrom($mail_addAddress,$mail_addName);//Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
	$mail->addReplyTo($mail_addAddress,$mail_addName);//Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
	$mail->addAddress($mail_setFromEmail, $mail_setFromName);   // Agregar quien recibe el e-mail enviado
	$title ='Hemos recibido tu Ticket de Servicio y te responderemos a la brevedad posible:';
	$message = file_get_contents($template);	
	$message = str_replace('{{title}}', utf8_decode($title), $message);
	$message = str_replace('{{interes}}', utf8_decode($mail_subject_client), $message);
	$message = str_replace('{{first_name}}', utf8_decode($mail_setFromName), $message);
	$message = str_replace('{{folio}}', utf8_decode($folio), $message);
	$message = str_replace('{{customer_email}}', utf8_decode($mail_setFromEmail), $message);
	$message = str_replace('{{message}}', utf8_decode($txt_message), $message);	
	$message = str_replace('{{subject}}', utf8_decode($mail_subject), $message);
	$message = str_replace('{{phone}}', utf8_decode($phone), $message);
	$message = str_replace('{{company}}', utf8_decode($company), $message);
	$message = str_replace('{{sucursal}}', utf8_decode($sucursal), $message);
	$message = str_replace('{{city}}', utf8_decode($city), $message);
	$message = str_replace('{{origin}}', '', $message);
	$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
	
	$mail->Subject = utf8_decode($mail_subject);
	$mail->msgHTML($message);
	$mail->send();
}
?>
