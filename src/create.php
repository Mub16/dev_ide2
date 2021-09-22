<?php
require_once("fnction/global_functions.php");
$userLogin = htmlspecialchars($_POST['login']);
$userName = htmlspecialchars($_POST['name']);
$userLastName = htmlspecialchars($_POST['lastname']);
$userDate = htmlspecialchars($_POST['date']);
$userActive = htmlspecialchars($_POST['chec']);
$data = $_POST;
if (isset($data['registers'])) {
    $err = array();
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
        reset_users_json($json);
        require "404.php";
    }
}
?>
<html>

<head>
    <title>
        web-create
    </title>
</head>

<body>
    <table align="center" border=1>
        <tr>
            <td>
                <form name="create" method="post" action="/users?create=users">
                    <p><b>Login:</b>
                        <input type="text" required size="40" name="login" value='<?php echo $userLogin ?>'>
                        <hr><b>Name:</b>
                        <input type="text" required size="40" name="name" value='<?php echo $userName ?>'>
                        <hr><b>LastName:</b>
                        <input type="text" required size="40" name="lastname" value='<?php echo $userLastName ?>'>
                        <hr><b>Date:</b>
                        <input type="date" required size="40" name="date" value="">
                        <hr><input type="radio" name="chec" value="active"> Active
                        <hr>
                        <center><button name="registers">Create</button></center>
                    </p>
                </form>
            </td>
        </tr>
    </table>
</body>

</html>