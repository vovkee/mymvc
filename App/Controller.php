<?php

namespace App;

class Controller
{
    public function runAction($action)
    {
        echo 'CONTROLLER->runAction('.$action.')<br>';
        if (!method_exists($this, $action)) {
            throw new \Exception("Method {$action} doesn't exist in " . get_class($this));
        }
        call_user_func_array(array($this, $action), array());
    }
}
