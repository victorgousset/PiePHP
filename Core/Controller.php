<?php

class Controller
{
    protected static $_render;

    protected function Render($view, $scope = [])
    {
        extract($scope); //importe variable

        $f = implode(DIRECTORY_SEPARATOR , [dirname(__DIR__),'src','View', str_replace('Controller','', basename(get_class($this))), $view]) .'.php';
        //$f == chemin vers la view
        if (file_exists($f))
        {
            include($f);
            ob_start(); //temporisation de sortie
            $view = ob_get_clean();//lis le contenu puis l'efface
            ob_start ();
            include(implode(DIRECTORY_SEPARATOR , [dirname(__DIR__),'src','View','index']) .'.php'); // ????
            self::$_render = ob_get_clean();
        }
    }
}