<?php
    $_SERVER['QUERY_STRING'];
    $routes = ['C:/Code/dev_ide1/src' => 'index.php'];
    echo 404;
    foreach ($routes as $key => $val) {
    if ($key == $_SERVER['QUERY_STRING']) require $val;
    };
?>