<?php

class Router
{
    private static $routes;

    public function Dynamique()
    {
        $url = explode("/", $_SERVER['REDIRECT_URL']);

        $class = ucfirst($url[2]);
        $methode = $url[3];

        if ($class == "User" && strlen($methode) == 0)
        {
            $user = new UserController();
            $user->loginAction();
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

    public static function Connect($url, $route)
    {
        self::$routes[$url] = $route;
    }

    public static function get($url)
    {
        return array_key_exists($url, self::$routes) ? self::$routes[$url] : null;
    }

}