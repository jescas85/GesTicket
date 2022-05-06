<?php
require_once "./models/viewsModel.php";

//Llamada al modelo y la vista
class viewsController extends viewsModel {

    public function get_template_controller(){
        return require_once "./views/template.php";
    }

    public function get_views_controller(){
        //variable utilizada en el .htaccess ->view
        if (isset($_GET['view'])) {
            $url = explode("/", $_GET['view']);
            //llamo a la funcion de la clase heredada class viewsModel
            $response = viewsModel:: get_views_model($url[0]);
        } else {
            $response= "login";
        }
        return $response;
        
    }
    
}
