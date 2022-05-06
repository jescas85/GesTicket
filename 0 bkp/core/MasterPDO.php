<?php
require_once ("configAPP.php");

class MasterPDO extends PDO{

    private $conexion;
    private $configuracion =[
        "driver" => DRIVER,
        "host" => SERVER,
        "database" => DB,
        "port" => PORT,
        "username" => USER,
        "password" => PASS,
        "charset" => CHARSET
    ];

    public function __construct(){
      try {
          $CONTROLLER = $this->configuracion["driver"];
          $SERVER = $this->configuracion["host"];
          $DB = $this->configuracion["database"];
          $PORT = $this->configuracion["port"];
          $USER = $this->configuracion["username"];
          $PASS = $this->configuracion["password"];
          $CODIF = $this->configuracion["charset"];

          switch ($CONTROLLER) {
            case 'sqlsrv':
              $dsn = "{$CONTROLLER}:server={$SERVER},{$PORT};"."database={$DB};";
              parent::__construct($dsn, $USER, $PASS);
              //aplicar atributo despues de la conexion a sql server
              $this->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);
              $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              break;
            
            case 'mysql':
              $dsn = "{$CONTROLLER}:host={$SERVER}:{$PORT};"."dbname={$DB};charset={$CODIF}";   
              parent::__construct($dsn, $USER, $PASS);
               //aplicar atributo despues de la conexion a sql server
              $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES "'.$CODIF.'"');
              $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              break;
          } 
          return ;
          //echo "CONXION EXITOSA!!"; 
        
        } catch (Exception $exc) {
            $exc->getMessage()."<br/>";
            die("¡Error! " . "<div style='color: red;'><strong>" . $exc->getMessage() . "</strong></div>");
        }
       
    }
    
    //EJECUTA CONSULTAS ASOCIATIVAS A LA BASE DE DATOS, DE VARIOS REGISTRO EN EL QUERY  
    public function selectAll($sql, $array = array())
    {
        try {
            $sth = $this->prepare($sql);
            foreach ($array as $key => $value) {
                $sth->bindValue("$key", $value);
            }
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }catch( PDOException $e ) {
            $this->log($e);
            return false;
        }
    }

    //EJECUTA UNA CONSULTA ASOCIATIVA A LA BASE DE DATOS, DEVUELVE VALORES QUE NO SEAN ARREGLOS, SOLO UN CAMPO  
    public function selectOne($sql, $array = array(), $limit = 1)
    {
        try {
            $sth = $this->prepare($sql . ' LIMIT ' . $limit);
            foreach ($array as $key => $value) {
                $sth->bindValue("$key", $value);
            }
            $sth->execute();
            return $sth->fetch(PDO::FETCH_ASSOC);
        }catch ( PDOException $e ){
            $this->log($e);
            return false;
        }
    }

    public function insert($table, $data)
    {
        try {
            ksort($data);

            $fieldNames = implode(', ', array_keys($data));
            $fieldValues = ':' . implode(', :', array_keys($data));

            $sth = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");

            foreach ($data as $key => $value) {
                $sth->bindValue(":$key", $value);
            }
            $sth->execute();
            return true;
        }catch ( PDOException $e ){
            $this->log($e);
            return false;
        }
    }

    function insertMulti($tableName, $array)
    {
        try {
            ksort($array);

            //Will contain SQL snippets.
            $fieldValues = array();
        
            //Will contain the values that we need to bind.
            $toBind = array();
            
            //Get a list of column names to use in the SQL statement.
            $fieldNames = implode(', ', array_keys($array[0]));            
        
            //Loop through our $data array.
            foreach($array as $arrayIndex => $row){
                $params = array();
                foreach($row as $columnName => $columnValue){
                    $param = ":" . $columnName . $arrayIndex;
                    $params[] = $param;
                    $toBind[$param] = $columnValue; 
                }
                
                $fieldValues[] = "(" . implode(", ", $params) . ")";
            }
        
            //Prepare our PDO statement.
            $sth = $this->prepare("INSERT INTO $tableName ( $fieldNames)  VALUES " . implode(", ", $fieldValues));
        
            //Bind our values.
            foreach($toBind as $param => $val){
                $sth->bindValue($param, $val);
            }
            
            //Execute our statement (i.e. insert the data).
            return $sth->execute();
        }catch ( PDOException $e ){
            $this->log($e);
            return false;
        }
    }

    public function insertLastID($table, $data)
    {
        try {
            ksort($data);

            $fieldNames = implode(', ', array_keys($data));
            $fieldValues = ':' . implode(', :', array_keys($data));

            $sth = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");
            foreach ($data as $key => $value) {
                $sth->bindValue(":$key", $value);
            }

            $sth->execute();

            return $this->lastInsertId();
        }catch ( PDOException $e ){
            $this->log($e);
            return false;
        }
    }

    public function update($table, $data, $where)
    {
        try {
            ksort($data);

            $fieldDetails = NULL;
            foreach ($data as $key => $value) {
                $fieldDetails .= "$key=:$key,";
            }
            $fieldDetails = rtrim($fieldDetails, ',');

            $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
            foreach ($data as $key => $value) {
                $sth->bindValue(":$key", $value);
            }

            $sth->execute();

            return true;
        }catch ( PDOException $e ){
            $this->log($e);
            return false;
        }
    }

    public function count($table, $where, $data=array())
    {
        try {
            ksort($data);

            if($where==''){
                $condition='';
            }
            else {
                $condition="WHERE $where";
            }

            $sth = $this->prepare("SELECT COUNT(*) as count FROM $table ". $condition );
            foreach ($data as $key => $value) {
                $sth->bindValue(":$key", $value);
            }

            $sth->execute();
            $sth = $sth->fetch(PDO::FETCH_ASSOC);

            return $sth['count'];

        }catch ( PDOException $e ){
            $this->log($e);
            return false;
        }
    }

    public function delete($table, $where, $limit = 1)
    {
        try {
            $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
            return true;
        }catch ( PDOException $e ){
            $this->log($e);
            return false;
        }
    }

    private function log($message){
        $file = fopen(DB_LOG_PATCH,"a");
        $message=$message.PHP_EOL.date("d/m/Y H:i:s").PHP_EOL.'-----------'.PHP_EOL;
        fwrite($file,$message);
        fclose($file);
    }
}
