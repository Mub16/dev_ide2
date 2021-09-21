<?php
$main = htmlspecialchars($_POST['user']);
echo '$_SERVER[REQUEST_URI]=';
var_dump($_SERVER['REQUEST_URI']);
echo '<br>';

echo "<hr>";
// var_dump($_SERVER);
echo '$_SERVER[QUERY_STRING]=';
var_dump($_SERVER['QUERY_STRING']);
echo '<br>';

echo '$_GET=';
var_dump($main);
echo '<br>';

$root = array(
    "/users" => "main.php",
    "/meny" => "index_main.php",
    "/meny/documents" => "/Set_Document/index.php",
    "/save" => "/save/index.php"
);
count($root);
var_dump($root);
foreach ($root as $key => $value) {
    if ($key == $_SERVER['REQUEST_URI']) {
        require $value;
    } else {
        http_response_code(404);
        echo '404';
        die();
    }
}
