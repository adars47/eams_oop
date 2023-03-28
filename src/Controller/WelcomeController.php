<?php

namespace App\Controller;

use App\Base\Controller;
use App\Model\User;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $this->post();
        $name = "Barsha Malbul";
        $age = 24;
        self::render('welcome',["name"=>$name,"age"=>$age]);
    }

    public function post()
    {
        $user = new User();
        $user->properties=[
            'email'=>"adars.nepal@gmail.com",
            'password'=>"Password@123"
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