<?php 
require_once "./core/configGeneral.php"; 
require_once "./controllers/viewsController.php";

//aqui se llama a la instancia, se hace con la palabra new
$template= new viewsController();
// aqui se llama a una funcion existente dentro de la clase ViewsController
$template->get_template_controller();


