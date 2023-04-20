<?php

namespace App\Controller;

use App\Base\Controller;

class SignInController extends Controller
{
    public function index()
    {
        self::render('login',[]);
        //render registration page
    }
}