<?php
$main = htmlspecialchars($_POST['user']);
//header("Location: /meny");
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

$url = preg_replace('#/test#', "", $_SERVER['REQUEST_URI']);

echo $url;
$root = array(
    "/?create=users" => "create.php",
    "/?list=users" => "main.php",
    "/" => "index_main.php",
    "/?list=documents" => "Set_Document/index.php",
    "/save" => "/save/index.php"
);



count($root);
var_dump($root);
$header_404 = true;
foreach ($root as $route => $script) {
    if ( $route == $url ) {
        if(file_exists ( $script )) {
            $header_404 = false; 
            require $script;
            break;
        }
        else {
            http_response_code(404);
            die('404 - Запрошенная страница не найдена');
        }
    }     
}
if($header_404) {
    http_response_code(404);
    die('404 - Запрошенная страница не найдена');
}

