<?php

namespace App\Controller;

use App\Base\Controller;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $name = "Barsha Malbul";
        $age = 24;
        self::render('welcome',["name"=>$name,"age"=>$age]);
    }

}