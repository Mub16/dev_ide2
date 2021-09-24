<?php

require_once "singleton.php";
require_once "controller.php";
/**class view extends singleton
{
    public static function render($root = new router)
    {
        extract($vars);
        require_once "views/".$template.'.php';
    }
}
 */
int_mine::router();
?>