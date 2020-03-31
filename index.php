<?php

use core\Router;

function customAutoload($class) 
{
    $path = str_replace('\\', '/', $class.'.php');

    if (file_exists($path)) 
    {
        require $path;
    }
}

spl_autoload_register('customAutoload');

$errorMode = 1;
ini_set('error_reporting', $errorMode);
ini_set('display_errors', $errorMode);
ini_set('display_startup_errors', $errorMode);

session_start();

$router = new Router;
$router->run();