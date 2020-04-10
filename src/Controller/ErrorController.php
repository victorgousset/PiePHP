<?php

require_once '././Core/Controller.php';

class ErrorController extends Controller
{
    public function Error($type)
    {
        error_reporting(E_ALL);
        ini_set("display_errors", 1);

        if($type == "404")
        {
            $this->Render('404');
        }
    }
}