<?php

namespace App;

class Routes
{
   public function get()
   {
       return array(
           'home'  => 'HomeController/index',
           'about' => 'HomeController/about'
       );
   }
}
