<?php

class Autoloader
{
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class)
    {
        if(substr($class, -10) == "Controller")
        {
            require_once './src/Controller/' . $class . '.php';
        } else {
            require_once $class . '.php';
        }
    }
}