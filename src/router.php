<?php
require_once("controller.php");
class router
{
    function router()
    {
        $url = preg_replace('#/test#', "", $_SERVER['REQUEST_URI']);
        $root = array(
            "/users=create" => "create.php",
            "/users?" => "writeline/main.php",
            "/" => "writeline/index_main.php",
            "/documents?" => "main_document.php",
            "/document?create=document" => "create_document.php",
            "/document=editor" => "update_document.php",
            "/document=update" => "update_save_document.php",
            "/document=delete" => "delete_document.php",
            "/users?create=users" => "create.php",
            "/users=update" => "update.php",
            "/users=delete" => "delete.php",
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
