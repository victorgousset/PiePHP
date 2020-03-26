<?php

function Core()
{
    require 'Core.php';
    require 'Router.php';
}

spl_autoload_register("Core");