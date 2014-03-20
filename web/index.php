<?php
    function root() {
        return dirname(__DIR__);
    }

    function is_debug() {
        return true;
    }

    if (is_debug())
        error_reporting(E_ALL);
    ini_set('display_errors', is_debug());

    spl_autoload_register(function($class) {
        $class = str_replace('\\', '/', $class);
        include root() . '/' . $class . '.php';
    });
    $core = new \App\Core();
    $core->execute();

   // $routes = dirname(__FILE__).'/../App/routes.php';

   // $router = new \App\Routing($routes);
   // $router->run();