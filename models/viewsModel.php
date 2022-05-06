<?php

class viewsModel
{
    protected function get_views_model($view)
    {
        //lista de palabras blancas permitidas en la url
        $white_list = $arrayName = ["home", "ticket-list", "ticket-new", "blank"];

        if (in_array($view, $white_list)) {
            if (is_file("views/contents/" . $view . "-view.php")) {
                $response = "views/contents/" . $view . "-view.php";
            } else {
                $response = "login";
            }

        } elseif ($view == "login") {
            $response = "login";
        } elseif ($view == "index") {
            $response = "login";
        } else {
            $response = "login";
        }
        return $response;
    }
}
