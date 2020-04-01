<?php

class Request
{
    public function checkPOST()
    {
        if(count($_POST) > 0)
        {
            $im = implode(' ', $_POST);
            return htmlentities($im);
        }
        return null;
    }

    public function checkGET()
    {
        if(count($_GET) > 0)
        {
            $im = implode(' ', $_GET);
            return htmlentities($im);
        }
        return null;
    }
}