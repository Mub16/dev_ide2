<?php
require_once("fnction/global_functions.php");
$fileID = htmlspecialchars($_POST["Delete"]);
//var_dump ($fileID);
$json = file_get_contents('Data/users/_file_derect.json');
$jsonArra = json_decode($json, true);
unlink("Data/users/$jsonArra[$fileID].json");
unset($jsonArra[$fileID]);
sort($jsonArra);
$jsonArra = array_replace($jsonArra);
$json = json_encode($jsonArra);
reset_users_json($json);
?>

<html>

<head>
    <title>
        web-delete
    </title>
</head>

<body>

</body>

</html>