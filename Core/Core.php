<?php

class Core
{
    public function __construct()
    {
        require_once 'autoload.php';
        require_once './src/routes.php';
        //require_once './src/Controller/UserController.php';
        //require_once './src/Controller/AppController.php';
    }

    public function run()
    {
        echo __CLASS__ . "[OK]" . PHP_EOL . "<br>";

        //var_dump($_SERVER['REDIRECT_URL']);

        if(($route = Router::get($_SERVER['REDIRECT_URL'])) != null)
        {
            echo "La route existe ";

            //var_dump($route['action']); AFFICHER LA ROUTE DEFINIE DANS ROUTES.PHP

            $class = ucfirst($route['controller']) . "Controller";
            $methode = $route['action'] . "Action";

            //var_dump($class, $methode);

            Autoloader::register();

            $controler = new $class();
            $controler->$methode();

        } else {
            echo "La route n'existe pas";
        }
    }
}