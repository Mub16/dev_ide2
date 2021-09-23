<?php
//require_once ("fnction\saveS.php");
$userLogin = htmlspecialchars($_POST['login']);
$userName = htmlspecialchars($_POST['name']);
$userLastName = htmlspecialchars($_POST['lastname']);
$userDate = htmlspecialchars($_POST['date']);
$userActive = htmlspecialchars($_POST['chec']);
if ($userLogin == "") {
    echo ("Err Login");
} elseif ($userName == "") {
    echo ("Err Name");
} elseif ($userLastName == "") {
    echo ("Err Last Name");
} elseif ($userDate == "") {
    echo ("Err Date Name");
} else {

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
    header("Refresh: 1;URL=index.php");
    exit;
}
    //$jsonArray = json_decode($json, true);
