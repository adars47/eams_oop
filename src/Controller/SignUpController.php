<?php

namespace App\Controller;

use App\Base\Controller;
use App\Model\User;
use App\Scheduler\WelcomeEmailScheduler;

class SignUpController extends Controller
{

    public function index()
    {
        self::render('register',[]);
        //render registration page
    }

    public function register()
    {
        $data = self::getParams()['post'];
        $user = new User();
        $user->properties=[
            'email'=>$data['email'],
            'password'=>$data['password']
        ];
//        $user->save();

        $wes = new WelcomeEmailScheduler();
        $wes->schedule($user->properties['email']);

    }


}