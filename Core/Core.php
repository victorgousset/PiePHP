<?php

use Router;
//use UserController;

class Core
{
    public function __construct()
    {
        require './src/routes.php';
    }

    public function run()
    {
        echo __CLASS__ . "[OK]" . PHP_EOL . "<br>";
    }
}