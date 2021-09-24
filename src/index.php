<?php
require_once("router.php");
require_once("controller.php");
/** Отладочная хрень:
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
*/
router::router_bat();
?>
