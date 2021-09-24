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

        function readelen()
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
        function rewrite()
        {
            $userLogin = htmlspecialchars($_POST['login']);
            $userName = htmlspecialchars($_POST['name']);
            $userLastName = htmlspecialchars($_POST['lastname']);
            $userDate = htmlspecialchars($_POST['date']);
            $userActive = htmlspecialchars($_POST['chec']);

            $fileID = htmlspecialchars($_POST["Edit"]);

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
                header("Location: ?list=users");
                exit;
            }
        }
    }
}

class documents
{
    function writeline()
    {
        require_once("fnction/local_functions.php");
        writeline_table();
    }

    public static function append()
    {
        require_once("fnction/local_functions.php");
        $organization = htmlspecialchars($_POST['организация']);
        $contacts = htmlspecialchars($_POST['контакты']);
        $dateStart = htmlspecialchars($_POST['date0']);
        $dateOut = htmlspecialchars($_POST['date1']);
        $Items = htmlspecialchars($_POST['предмет']);
        $Accaunt = htmlspecialchars($_POST['сумма']);
        $INN = htmlspecialchars($_POST['ИНН']);
        $Sertificate = htmlspecialchars($_POST['сертификат']);
        $data = $_POST;
        if (isset($data['registers'])) {
            if ($dateStart > $dateOut) {
                echo ("Некоректная дата");
            } else {
                $jsonArra[] = $organization;
                $jsonArra[] = $contacts;
                $jsonArra[] = $dateStart;
                $jsonArra[] = $dateOut;
                $jsonArra[] = $Items;
                $jsonArra[] = $Accaunt;
                $jsonArra[] = $INN;
                $jsonArra[] = $Sertificate;
                $id = rand(0, 999999999999999999);
                $json = json_encode($jsonArra);
                file_put_contents("Documents/$id.json", $json, JSON_FORCE_OBJECT);
                unset($jsonArra, $json);
                $json = file_get_contents('Documents/_file_derect.json');
                $jsonArra = json_decode($json, true);
                $jsonArra[] = $id;
                $json = json_encode($jsonArra);
                reset_users_json($json);
                header("Location: documents?");
                exit;
            }
        }
    }

    function readelen()
    {
        $fileID = htmlspecialchars($_POST["Edit"]);
        $json = file_get_contents('Documents/_file_derect.json'); // Ошибка Warning: file_get_contents(Set_Document/Documents/_file_derect.json): failed to open stream: No such file or directory in /var/www/Set_Document/update.php on line 3
        $jsonArra = json_decode($json, true);
        $sep = $jsonArra[$fileID];
        $json0 = file_get_contents("Documents/$sep.json"); // Warning: file_get_contents(Set_Document/Documents/.json): failed to open stream: No such file or directory in /var/www/Set_Document/update.php on line 6
        $jsonArra0 = json_decode($json0, true);
        //$URL = ($jsonArra0[$step]);
        $organization = $jsonArra0[0];
        $contacts = $jsonArra0[1];
        $dateStart = $jsonArra0[2];
        $dateOut = $jsonArra0[3];
        $Items = $jsonArra0[4];
        $Accaunt = $jsonArra0[5];
        $INN = $jsonArra0[6];
        $Sertificate = $jsonArra0[7];
    }
    function rewrite()
    {
        require_once("fnction/local_functions.php");

        $organization = htmlspecialchars($_POST['организация']);
        $contacts = htmlspecialchars($_POST['контакты']);
        $dateStart = htmlspecialchars($_POST['date0']);
        $dateOut = htmlspecialchars($_POST['date1']);
        $Items = htmlspecialchars($_POST['предмет']);
        $Accaunt = htmlspecialchars($_POST['сумма']);
        $INN = htmlspecialchars($_POST['ИНН']);
        $Sertificate = htmlspecialchars($_POST['сертификат']);

        $fileID = htmlspecialchars($_POST["Edit"]);
        $jsonArra[] = $organization;
        $jsonArra[] = $contacts;
        $jsonArra[] = $dateStart;
        $jsonArra[] = $dateOut;
        $jsonArra[] = $Items;
        $jsonArra[] = $Accaunt;
        $jsonArra[] = $INN;
        $jsonArra[] = $Sertificate;
        $json = json_encode($jsonArra);
        file_put_contents("Documents/$fileID.json", $json, JSON_FORCE_OBJECT);
        header("Location: documents?");
        exit;
    }
}
