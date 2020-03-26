<?php

class Router
{
    public function Dynamique()
    {
        $url = explode("/", $_SERVER['REDIRECT_URL']);
        var_dump($url);

        $class = ucfirst($url[2]);
        $methode = $url[3];

        echo $class . "->" . $methode . "<br>";
        $controler = new $class();
        $controler->$methode();

        if(class_exists($class) == true && method_exists($class, $methode))
        {
            echo $class . "->" . $methode . "<br>";
            $controler = new $class();
            $controler->$methode();
        } else {
            echo "nop";
        }
    }
}