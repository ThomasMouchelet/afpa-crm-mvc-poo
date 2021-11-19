<?php
require_once "../config/dev.php";
require_once "../vendor/autoload.php";

// require_once "../config/Autoloader.php";
// use App\config\Autoloader;
// Autoloader::register();

use App\config\Router;

$router = new Router();
$router->run();
