<?php

namespace App;

class Routing
{
    private function getUrl()
    {
        echo 'ROUTING->getUrl()<br>';
        $controllerName = '';
        $actionName = '';
        $url = explode('/',$_SERVER['REQUEST_URI']);
        if (!empty($url[1]))
        {
            $controllerName = $url[1];
        }
        if (!empty($url[2]))
        {
            $actionName = $url[2];
        }
        $controllerName = $controllerName.'Controller';
        $actionName     = $actionName.'Action';
        return array(
            'Class' => $controllerName,
            'Method' => $actionName
        );
    }
    private function match()
    {

        echo 'ROUTING->match()<br>';

        $routes = new Routes();


    }

    public function run()
    {
        echo 'ROUTING->run()<br>';
        $data = $this->getUrl();

        $data['Class'] = 'Controller\\'.$data['Class'];
        if (class_exists($data['Class'])) {
            $controller = new $data['Class']();
            $controller->runAction($data['Method']);
        } else {
            throw new \Exception('Class "'.$data['Class'].'" not found!');
        }
        /*$ControllerPath = (__DIR__)."/controller/".$data['Class'].".php";
        if(file_exists($ControllerPath))
        {
            include $ControllerPath;
        }
        var_dump($ControllerPath);*/

    }
}