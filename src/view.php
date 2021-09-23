<?php

require_once "singleton.php";

class view extends singleton
{
    public static function render($root = new router)
    {
        extract($vars);
        require_once "views/".$template.'.php';
    }
}