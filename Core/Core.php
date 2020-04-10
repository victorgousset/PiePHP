<?php

class Core
{
    public function __construct()
    {
        require_once 'autoload.php';
        require_once './src/routes.php';
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

        } elseif (($route = Router::get($_SERVER['REDIRECT_URL'])) == null) {
            $idUser = intval(substr($_SERVER['REDIRECT_URL'], 21));
           // var_dump(substr($_SERVER['REDIRECT_URL'], 13, 7));
            if(substr($_SERVER['REDIRECT_URL'], 13, 7) == "details" && is_int($idUser) == true) {

                $detailUser = new UserController();
                $detailUser->DetailUserAction($idUser);
            } elseif (substr($_SERVER['REDIRECT_URL'], 13, 6) == "delete" && is_int(intval(substr($_SERVER['REDIRECT_URL'], 20))) == true) {
                $deleteUser = new UserController();
                $deleteUser->deleteUserAction(intval(substr($_SERVER['REDIRECT_URL'], 20)));
            } else {
                $error = new ErrorController();
                $error->Error('404');
            }
        }
    }
}