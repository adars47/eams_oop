<?php

namespace App\Controller;

use App\Base\Controller;
use App\Model\User;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $name = "Barsha Malbul";
        $age = 20;
        self::render('welcome',["name"=>$name,"age"=>$age]);
    }

    public function post()
    {
        $user = new User();
        $user->properties=[
            'email'=>"barsha.malbul@gmail.com",
            'password'=>"Password@1234"
        ];
        $user->save();

    }

    public function list()
    {
        $user = new User();
        $users = $user->fetchAll();
        var_dump($users);die;

    }

}