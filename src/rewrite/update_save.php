<?php
require_once("fnction/global_functions.php");

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
