<?php

class singleton
{
    private static $instance = null;

    public static function getInstance(): singleton
    {
        if(static::$instance === null)
        {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
        
    }
}