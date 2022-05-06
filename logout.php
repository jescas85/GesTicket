<?php
require_once "./core/configGeneral.php"; 
session_start();
#require_once("./core/MasterPDO.php");
session_destroy();
header("Location:".PATH."login");
exit();
?>