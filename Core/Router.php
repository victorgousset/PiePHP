<?php

use UserController;
//use AppController;

class Router
{

    private $class;

    public function __construct()
    {
        require './src/Controller/UserController.php';
    }

    public function Dynamique()
    {
        $url = explode("/", $_SERVER['REDIRECT_URL']);

        $class = ucfirst($url[2]);
        $methode = $url[3];

        if ($class == "User" && strlen($methode) == 0)
        {
            $user = new UserController();
            $user->indexAction();
        } else {
            if (class_exists($class) == true && method_exists($class, $methode) == true) {
                echo $class . "->" . $methode . "<br>";
                $controler = new $class();
                $controler->$methode();
            } else {
                echo "404";
            }
        }
    }

    public function Connect()
    {

    }

}