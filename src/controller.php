<?php
require_once("model.php");

/**class int_mine
{
    static function router()
    {
        $url = preg_replace('#/test#', "", $_SERVER['REQUEST_URI']);
        if ($url == "/") {
            require "writeline/index_main.php";
        } else if ($url == "/users?") {
            user::writeline();
        } else if ($url == "/documents?") {
            //documents::writeline();
            require "404.php";
        } else if ($url == "/users?create=users") {
            require "create/create.php";
            //user::append();
        } else if ($url == "/create/user") {
            user::append();
        }
        else if ($url == "/users=delete") {
            user::erase();}
        else if ($url == "/users=update"){
            user::readelen();
        }
        else if ($url == "/update"){
            user::rewrite();
        }
         else {
            require "404.php";
        }
    }
}
*/
/** 

 */
class user
{
    static function writeline()
    {
        users::writeline();
    }
    static function val($userLogin,$userName,$userLastName,$userDate,$userActive)
    {
        $err=[];
        if ($userLogin == ""){
            $err="Некоректный логин $userLogin";
        }
        else if ($userName == ""){
            $err="Некоректное имя $userName";
        }
        else if ($userLastName == ""){
            $err="Не коректная Фамилия $userLastName";
        }
        else if ($userDate == ""){
            $err="Не коректная дата $userDate";
        }
        else if (empty($err)){
            //$data = $_POST;
            users::append($userLogin, $userName, $userLastName, $userDate, $userActive);
        }
        //header("Location: ");
        //echo($err[0]);
    }

    static function append()
    {
        $userLogin = htmlspecialchars($_POST['login']);
        $userName = htmlspecialchars($_POST['name']);
        $userLastName = htmlspecialchars($_POST['lastname']);
        $userDate = htmlspecialchars($_POST['date']);
        $userActive = htmlspecialchars($_POST['chec']);
        user::val($userLogin,$userName,$userLastName,$userDate,$userActive);
        //haders("Location: users?");

    }
    static function readelen()
    {
        $fileID = htmlspecialchars($_POST["Edit"]);
        var_dump($fileID);
        users::readelen($fileID);
    }
    static function rewrite()
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
    static function erase(){
        $fileID = htmlspecialchars($_POST["Delete"]);
        users::erase($fileID);
    }
}
