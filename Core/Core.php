<?php

//use Router;
use UserController;

class Core
{
    public function __construct()
    {
        require './src/routes.php';
        require './src/Controller/UserController.php';
    }

    public function run()
    {
        echo __CLASS__ . "[OK]" . PHP_EOL . "<br>";

        $url = explode("/", $_SERVER['REDIRECT_URL']);
        var_dump($url);

        $class = ucfirst($url[2]);
        $methode = $url[3];

        echo $class . "->" . $methode . "<br>";
        $controler = new $class();
        $controler->$methode();
    }
}