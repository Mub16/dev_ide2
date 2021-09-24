<?php
require_once("controller.php");
require_once("fnction/global_functions.php");
class router
{
    static function router_bat()
    {
        $url = preg_replace('#/test#', "", $_SERVER['REQUEST_URI']);
        $root = array(
            "/n" => "writeline/index_main.php",
            "/users?" => "writeline/main.php",
            "/create.user" => "controler.php",
            "/create.document" => "controler.php",
            "/" => "controler.php",

            "/404" => "404.php"
        );
        count($root);
        $header_404 = true;
        foreach ($root as $route => $script) {
            if ($route == $url) {
                if (file_exists($script)) {
                    $header_404 = false;
                    require $script;
                    break;
                } else {
                    http_response_code(404);
                    //die('404 - Запрошенная страница не найдена');
                    require "404.php";
                }
            }
        }
        if ($header_404) {
            http_response_code(404);
            //die('404 - Запрошенная страница не найдена');
            require "404.php";
        }
    }
}
