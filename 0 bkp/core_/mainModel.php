<?php
  if ($askAjax) { //condicion par saber si estamos usando ajax
    require_once("../core/configAPP.php");
  } else {
    require_once("./core/configAPP.php");
  }
  
class mainModel{

  

  public function __construct(){
      
  }

    protected function conectar(){
      //PARAMETROS DE CONEXION
      $configuracion =[
      "driver" => DRIVER,
      "host" => SERVER,
      "database" => DB,
      "port" => PORT,
      "username" => USER,
      "passwordd" => PASS,
      "charset" => CHARSET
  ];
      try {
          $CONTROLLER = $this->configuracion["driver"];
          $SERVER = $this->configuracion["host"];
          $DB = $this->configuracion["database"];
          $PORT = $this->configuracion["port"];
          $USER = $this->configuracion["username"];
          $PASS = $this->configuracion["password"];
          $CODIF = $this->configuracion["charset"];

          $url = "{$CONTROLLER}:host={$SERVER}:{$PORT};"
                  ."bdname={$DB};charset={$CODIF}";
          //Se crea la conexion
          $conexion = new PDO($url, $USER, $PASS);
          return $conexion;
        
      } catch (Exception $e) {
        echo "NO SE PUDO CONECTAR";
          echo $e->getTraceAsString();
      }
    }

    protected function run_query_simple($qr){
        $response = self::conectar()->prepare($qr);
        $response->execute();
        return $response;
    }

}
