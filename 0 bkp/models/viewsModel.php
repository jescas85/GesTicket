<?php

class viewsModel
{

    protected function get_views_model($view)
    {
        //lista de palabras blancas permitidas en la url
        $white_list = $arrayName = ["login", "about", "contact", "documentation", "faq", "news-left-sidebar", "news-right-sidebar","store","form-quote","form-ticket","news-single", "pricing", "projects", "projects-single", "service-single","residencial-single","business-single","inmobiliaria-single","redes-single", "services", "team", "testimonials","home-2","404"];

        if (in_array($view, $white_list)) {
            if (is_file("./views/contents/" . $view . "-view.php")) {
                $response = "./views/contents/" . $view . "-view.php";
            } else {
                $response = "home";
            }

        } elseif ($view == "home") {
            $response = "home";
        } elseif ($view == "index") {
            $response = "home";
        } else {
            $response = "404";
        }
        return $response;
    }
}
