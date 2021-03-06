<?php

class Request
{

    public function __construct()
    {
        $this->checkPOST();
        $this->checkGET();
    }

    public function checkPOST()
    {
        if(count($_POST) > 0)
        {
            $im = implode(' ', $_POST);
            htmlentities($im);
            trim($im);
            stripcslashes($im);
            return filter_var($im, FILTER_SANITIZE_STRING);
        }
    }

    public function checkGET()
    {
        if(count($_GET) > 0)
        {
            $im = implode(' ', $_GET);
            htmlentities($im);
            trim($im);
            stripcslashes($im);
            return filter_var($im, FILTER_SANITIZE_STRING);
        }
    }
}