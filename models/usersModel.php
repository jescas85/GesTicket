<?php

    class User extends MasterPDO{

        public function login(){
            //$conectar=parent::conexion();
            //parent::set_names();
            if(isset($_POST["enviar"])){

                $correo = $_POST["UserEmail"];
                $password = $_POST["UserPass"];

                if (empty($correo) && empty($password)) {
                    header("Location:".PATH."index.php?m=2");
                    exit();
                }else{
                    $sql = "SELECT * FROM gt_usuario WHERE Correo=? AND Password=? AND Estatus=1";
                    $stmt = parent::prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->bindValue(2, $password);
                    $stmt->execute();

                    $result = $stmt->fetch();

                    if (is_array($result) && count($result)>0) {
                        $_SESSION["IDUser"]=$result["IDUser"];
                        $_SESSION["Nombres"]=$result["Nombres"];
                        $_SESSION["Apellidos"]=$result["Apellidos"];
                        header("Location:".PATH."home/");
                        exit();

                    } else {
                        header("Location:".PATH."index.php?m=1");
                        exit();
                    }
                    
                }
            }
        }
    }