<?php
$_SERVER['QUERY_STRING'];
$routes = ['/user/create' => 'user_create.php'];
echo 404;
foreach ($routes as $key => $val); {
if ($key == $_SERVER['QUERY_STRING']) {
    require $val};
?>