<?php

class UserController
{
    private static $_render = "";

    public function __construct()
    {
        self::$_render = "";
    }

    public function test()
    {
        echo "echo controller !!!!";
    }

    public function indexAction()
    {
        echo "indexAction";
    }

    public function addAction()
    {
        echo "addAction methode";
    }

    protected function Render($view, $scope = [])
    {
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR , [dirname(__DIR__),'src','View', str_replace('Controller','', basename(get_class($this))), $view]) .'.php';
        if (file_exists($f))
        {
            ob_start();
            include($f);
            $view = ob_get_clean();
            ob_start ();
            include(implode(DIRECTORY_SEPARATOR , [dirname(__DIR__),'src','View','index']) .'.php');
            self::$_render = ob_get_clean();
        }
    }
}