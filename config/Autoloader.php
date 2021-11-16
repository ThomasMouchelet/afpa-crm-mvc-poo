<?php

namespace App\config;

class Autoloader
{
    public static function  register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class)
    {
        // App\src\Controller\HomeController
        $class = str_replace("App", '', $class);
        // src\Controller\HomeController
        $class = str_replace("\\", '/', $class);
        // src/Controller/HomeController

        require_once '../' . $class . '.php';
    }
}
