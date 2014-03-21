<?php

namespace App;

class Routing
{
    private $routes;

    public function __construct($routes = array())
    {
        $this->routes = $routes;
    }

    private function getUrl()
    {
        $url = explode('?', $_SERVER['REQUEST_URI'], 2);

        return $url[0];
    }
    private function match()
    {
        $request = $this->getUrl();

        foreach($this->routes as $url => $toCall)
        {
            if ($url == $request) {
                return array(
                    'Class' => $toCall[0],
                    'Method' => $toCall[1]
                );
            }
        }
        return array(
            'Class' => 'Debug',
            'Method' => 'notFound'
        );
    }

    public function run()
    {
        $data = $this->match();
        $data['Class'] = 'Controller\\'.$data['Class'].'Controller';
        $data['Method'] = $data['Method'].'Action';
        if (class_exists($data['Class'])) {
            $controller = new $data['Class']();
            $controller->runAction($data['Method']);
        } else {
            throw new \Exception('Class "'.$data['Class'].'" not found!');
        }
    }
}