<?php
require_once("model.php");

class int_mine
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
        } else if ($url == "/create.user") {
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
/** 

 */
class user
{
    static function writeline()
    {
        users::writeline();
    }

    static function append()
    {
        $userLogin = htmlspecialchars($_POST['login']);
        $userName = htmlspecialchars($_POST['name']);
        $userLastName = htmlspecialchars($_POST['lastname']);
        $userDate = htmlspecialchars($_POST['date']);
        $userActive = htmlspecialchars($_POST['chec']);

        $data = $_POST;

        users::append($userLogin, $userName, $userLastName, $userDate, $userActive);
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

/**
 * 
 *殪幢緻Iii爰曷樔黎㌢´　　｀ⅷ
 *艇艀裲f睚鳫巓襴骸　　　　贒憊
 *殪幢緻I翰儂樔黎夢'”　 　 ,ｨ傾
 *盥皋袍i耘蚌紕偸′　　　 雫寬I
 *悗f篝嚠篩i縒縡齢　　 　 Ⅷ辨f
 *輯駲f迯瓲i軌帶′　　　　　`守I厖孩
 *幢儂儼巓襴緲′　 　 　 　 　 `守枢i磬廛
 *嚠篩I縒縡夢'´　　　 　 　 　 　 　 `守峽f
 *蚌紕襴緲′　　 DOCUMENTS_WORK　　　　‘守畝
 *瓲軌揄′　　　　　　　　　　　　　     ,gf毯綴
 *鳫襴鑿　　　　　　　　　　 　 　       奪寔f厦
 *絨緲′　　　　　　 　 　 　 　　　　 　 ”'罨悳
 *巓緲′　　　　　　 　 　 　 　 　 　 綴〟 ”'罨椁
 *巓登嶮 薤篝㎜㎜ g　 　 緲　 　 甯體i爺綴｡, ”'罨琥
 *軌襴暹 甯幗緲fi'　　 緲',纜　　贒i綟碕碚爺綴｡ ”'罨皴
 *巓襴驫 霤I緲緲　　 纜穐　　甯絛跨飩i髢綴馳爺綴｡`'等誄 
 *
 */
class documents
{
}
