<?php
require_once("fnction/global_functions.php");
require_once("controller.php");
require_once("view.php");
class users
{
    static function writeline()
    {
        require("writeline/main.php");
    }

    static function append($userLogin, $userName, $userLastName, $userDate, $userActive)
    {
        if ($userLogin == "") {
            $err[] = ("Err Login");
            echo ("Err Login");
        } elseif ($userName == "") {
            $err[] = ("Err Name");
            echo ("Err Name");
        } elseif ($userLastName == "") {
            $err[] = ("Err Last Name");
            echo ("Err Last Name");
        } elseif ($userDate == "") {
            $err[] = ("Err Date");
            echo ("Err Date");
        } elseif (empty($err)) {
            $jsonArra[] = $userLogin;
            $jsonArra[] = $userName;
            $jsonArra[] = $userLastName;
            $jsonArra[] = $userDate;
            $jsonArra[] = $userActive;
            $id = rand(0, 999999999999999999);
            $json = json_encode($jsonArra);
            file_put_contents("Data/users/$id.json", $json, JSON_FORCE_OBJECT);
            unset($jsonArra, $json);
            $json = file_get_contents('Data/users/_file_derect.json');
            $jsonArra = json_decode($json, true);
            $jsonArra[] = $id;
            $json = json_encode($jsonArra);
            file_put_contents("Data/users/_file_derect.json", $json, JSON_FORCE_OBJECT);
            header("Location: users?");
            echo ("ok");
            exit;
        }
    }

    static function readelen($fileID)
    {
        //require("rewrite/update.php");
        //var_dump($fileID);
        $json = file_get_contents('Data/users/_file_derect.json');
        $jsonArra = json_decode($json, true);
        //$sep = $jsonArra[$fileID];//Проблема гдето здесь решаю.
        $json0 = file_get_contents("Data/users/$jsonArra[$fileID].json");
        $jsonArra0 = json_decode($json0, true);
        $userLogin = $jsonArra0[0];
        $userName = $jsonArra0[1];
        $userLastName = $jsonArra0[2];
        $userDate = $jsonArra0[3];
        $userActive = $jsonArra0[4];
        var_dump($jsonArra0);
        //var_dump($sep);
    }

    static function rewrite($userLogin, $userName, $userLastName, $userDate, $userActive, $fileID)
    {
        if ($userLogin == "") {
            backMain();
            echo ("Err Login");
        } elseif ($userName == "") {
            backMain();
            echo ("Err Name");
        } elseif ($userLastName == "") {
            backMain();
            echo ("Err Last Name");
        } elseif ($userDate == "") {
            backMain();
            echo ("Err Date Name");
        } else {
            $jsonArra[] = $userLogin;
            $jsonArra[] = $userName;
            $jsonArra[] = $userLastName;
            $jsonArra[] = $userDate;
            $jsonArra[] = $userActive;
            $json = json_encode($jsonArra);
            file_put_contents("Data/users/$fileID.json", $json, JSON_FORCE_OBJECT);
        }
    }

    static function erase($fileID)
    {
        $json = file_get_contents('Data/users/_file_derect.json');
        $jsonArra = json_decode($json, true);
        unlink("Data/users/$jsonArra[$fileID].json");
        unset($jsonArra[$fileID]);
        sort($jsonArra);
        $jsonArra = array_replace($jsonArra);
        $json = json_encode($jsonArra);
        reset_users_json($json);
    }
}
