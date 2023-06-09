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
            'password'=>$data['password'],
            'fullName'=>$data['fullName']
        ];
        $user->save();
        $_SESSION['user'] = $user;

        $wes = new WelcomeEmailScheduler();
        $wes->schedule(
            array(
                "email"=>$user->properties['email'],
                "fullName"=>$user->properties['fullName'],
            )
        );
        $_SESSION['success'][] =[
            "title"=> "dashboard",
            "message" => "Welcome to the E-commerce site."
        ];
        header("Location: " . "dashboard");

        exit;
    }


}