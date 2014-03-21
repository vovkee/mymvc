<?php

namespace App;

class Core
{
    private $router;



    private $configs = 'Configs';

    public function __construct()
    {
        $routes = $this->getConfigs('Routes');
        $this->router = new Routing($routes);
    }

    public function execute()
    {
        echo 'CORE->execute()<br>';
        try {
            $this->router->run();
        } catch (\Exception $e) {
            echo 'Error: '.$e->getMessage();
        }
    }

    private function getConfigs($name)
    {
        return include dirname(__DIR__).'/'.$this->configs.'/'.$name.'.php';
    }

    public static function get($key, $default = null)
    {
        return self::arr($_GET, $key, $default);
    }

    public static function post($key, $default = null)
    {
        return self::arr($_SERVER, $key, $default);
    }

    public static function arr($array, $key, $default)
    {
        if (isset($array[$key])) {
            return $array[$key];
        }
        return $default;

    }
}
