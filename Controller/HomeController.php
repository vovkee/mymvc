<?php

namespace Controller;

use App\Controller;
use App\Core;

class HomeController extends Controller
{
    public function indexAction()
    {
        echo 'HomeCONTROLLER->indexAction()<br>';
        echo '<h1>ITS A HOMEPAGE</h1>';
        echo Core::get('name');

    }

    public function contactAction()
    {
        echo 'HomeController->contactAction()<br>';
        echo '<h1>ITS A Contact page!!!</h1>';
    }
} 