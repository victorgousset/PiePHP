<?php

function Core()
{
    require_once 'Core.php';
    require_once 'Router.php';
}

spl_autoload_register("Core");

//autoloader
//Routeur dynamique