<?php
require_once("include_path=Set_Document/local/local_functions.php");//Ошибка Fatal error: require_once(): Failed opening required 'include_path=Set_Document/local/local_functions.php' (include_path='.:/usr/local/lib/php') in /var/www/Set_Document/delete.php on line 2
$fileID = htmlspecialchars($_POST["Delete"]);
//var_dump ($fileID);
$json = file_get_contents('Set_Document/Documents/_file_derect.json');
$jsonArra = json_decode($json, true);
unlink("Set_Document/Documents/$jsonArra[$fileID].json");
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