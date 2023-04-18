<?php

namespace App\Controller;

use App\Base\Controller;

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
        var_dump($data);die;
        //register the user
    }


}