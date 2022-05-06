<?php
include ("configAPP.php");

class Conexion{

    private $conexion;
    private $configuracion =[
        "driver" => DRIVER,
        "host" => SERVER,
        "database" => DB,
        "port" => PORT,
        "username" => USER,
        "passwordd" => PASS,
        "charset" => CHARSET
    ];

    public function __construct(){
        
    }

    public function conectar(){
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
          $this->conexion = new PDO($url, $USER, $PASS);
        
      } catch (Exception $exc) {
        echo "NO SE PUDO CONECTAR";
          echo $exc->getTraceAsString();
      }
    }
    
}
