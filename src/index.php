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
    "/users=create" => "create.php",
    "/users?" => "main.php",
    "/" => "index_main.php",
    "/documents?" => "main_document.php",
    "/document?create=document" => "create_document.php",
    "/document=editor" => "update_document.php",
    "/document=update" => "update_save_document.php",
    "/document=delete" => "delete_document.php",
    "/users?create=users" => "create.php",
    "/users=update" => "update.php",
    "/users=delete" => "delete.php",
    "/404" => "404.php"

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
            //die('404 - Запрошенная страница не найдена');
            require "404.php";
        }
    }     
}
if($header_404) {
    http_response_code(404);
    //die('404 - Запрошенная страница не найдена');
    require "404.php";
}

