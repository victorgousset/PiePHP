<?php

$test = "\ ";
$testdeux = substr($test, 0, 1);

define('BASE_URI', str_replace($testdeux,'/', substr(__DIR__ , strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR , ['Core','autoload.php']));

Autoloader::register();

$app = new Core();
$routeur = new Router();

$app->run();
//$routeur->Dynamique();