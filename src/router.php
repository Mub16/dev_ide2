<?php
//require_once("controller.php");
require_once("fnction/global_functions.php");
require_once("model.php");

class Controller
{
    function create()
    {
        $userLogin = htmlspecialchars($_POST['login']);
        $userName = htmlspecialchars($_POST['name']);
        $userLastName = htmlspecialchars($_POST['lastname']);
        $userDate = htmlspecialchars($_POST['date']);
        $userActive = htmlspecialchars($_POST['chec']);
        $fileID = htmlspecialchars($_POST["Edit"]);
        var_dump($fileID);
        die();
        users::rewrite($userLogin, $userName, $userLastName, $userDate, $userActive, $fileID);
    }

    function list()
    {
        require("writeline/main.php");
        //die("LIST");
        //writeline_table();
    }

    function update()
    {
        die("UPDATE user {$_GET['id']}");
        //$fileID = ($_GET['id']);
        //users::readelen($fileID);
        //haders("rewrite/update.php");
    }
}
//
class router
{
    static function router_bat()
    {
        //echo ($_GET['id']);
        $myObj = new Controller();
        $url = $_SERVER['REQUEST_URI'];
        $root = array(
            "/user" => "list",
            "/user/create" => "create",
            "/user/update?id=".$_GET['id'] => "update"
        );
        //var_dump($root);
        //var_dump($root);
        $e404 = true;
        foreach ($root as $routev => $value) {
            //var_dump($value);
            if ($url == $routev) {
                $e404 = false;
                $myObj -> $value();
                return;
            }
        }
        if ($e404 == true) {
            http_response_code(404);
            //die('404 - Запрошенная страница не найдена');
            require "404.php";
        }
    }
}
        /*



        /user ->  Controller-List
        /user/create Controller-create
        /user/update?id=1 Controller-update

        */
        /*
        $root = array(
            "/" => "controler.php",
            "/n" => "writeline/index_main.php",
            "/users?" => "/writeline/main.php",
            "/users=update" => "controler.php",
            "/create/user" => "controler.php",
            "/create.document" => "controler.php",
            "/update" => "controler.php",
            "/404" => "404.php"
        );
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
        */
    //}
//}
