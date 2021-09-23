<?php
class users
{
    public $userLogin;
    public $userName;
    public $userLastName;
    public $userDate;
    public $userActive;

    function writeline()
    {
        require_once("fnction/global_functions.php");
        writeline_table();
    }

    public static function append()
    {
        $userLogin = htmlspecialchars($_POST['login']);
        $userName = htmlspecialchars($_POST['name']);
        $userLastName = htmlspecialchars($_POST['lastname']);
        $userDate = htmlspecialchars($_POST['date']);
        $userActive = htmlspecialchars($_POST['chec']);
        $data = $_POST;
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
            //reset_users_json($json);
            echo ("ok");
        }

        function rewrite()
        {
            $fileID = htmlspecialchars($_POST["Edit"]);
            $json = file_get_contents('Data/users/_file_derect.json');
            $jsonArra = json_decode($json, true);
            $sep = $jsonArra[$fileID];
            $json0 = file_get_contents("Data/users/$jsonArra[$fileID].json");
            $jsonArra0 = json_decode($json0, true);
            //$URL = ($jsonArra0[$step]);
            $userLogin = $jsonArra0[0];
            $userName = $jsonArra0[1];
            $userLastName = $jsonArra0[2];
            $userDate = $jsonArra0[3];
            $userActive = $jsonArra0[4];
        }
    }
}

class documents
{
}
