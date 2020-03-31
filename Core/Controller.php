<?php

class Controller
{
    protected static $_render;

    public function __construct($view)
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $this->Render($view);
    }

    protected function Render($view, $scope = [])
    {
        extract($scope);

        $f = implode(DIRECTORY_SEPARATOR , [dirname(__DIR__),'src','View', str_replace('Controller','User', basename(get_class($this))), $view]) .'.php';

        if (file_exists($f))
        {
            include($f);
            ob_start();
            $view = ob_get_clean();
            ob_start ();
            include(implode(DIRECTORY_SEPARATOR , [dirname(__DIR__),'src','View','index']) .'.php');
            self::$_render = ob_get_clean();
        }
    }
}