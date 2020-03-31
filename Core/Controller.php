<?php

class Controller
{
    protected static $_render;

    public function __construct($view)
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        var_dump($view);
        var_dump(self::$_render);
        $this->Render($view);
    }

    protected function Render($view, $scope = [])
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        extract($scope);

        $f = implode(DIRECTORY_SEPARATOR , [dirname(__DIR__),'src','View', str_replace('Controller','User', basename(get_class($this))), $view]) .'.php';

        var_dump($f);

        if (file_exists($f))
        {
            ob_start();
            include($f);
            $view = ob_get_clean();
            ob_start ();
            include(implode(DIRECTORY_SEPARATOR , [dirname(__DIR__),'src','View','index']) .'.php');
            self::$_render = ob_get_clean();
            echo self::$_render;
        }
    }
}