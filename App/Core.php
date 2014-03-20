<?php

namespace App;

class Core
{
    private $router;

    public function __construct()
    {
        $this->router = new Routing();
    }

    public function execute()
    {
        echo 'CORE->execute()<br>';
        $this->router->run();
    }
}
