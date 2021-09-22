<?php
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
    //header("Location: index.php");
    //exit;
