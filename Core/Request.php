<?php

class Request
{
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
        return null;
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
        return null;
    }
}