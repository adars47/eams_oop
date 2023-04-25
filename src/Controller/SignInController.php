<?php

namespace App\Controller;

use App\Base\Controller;
use App\Exceptions\InvalidCredentialsException;
use App\Model\User;
use http\Exception\InvalidArgumentException;

class SignInController extends Controller
{
    public function index()
    {
        self::render('login',[]);
        //render registration page
    }

    public function login()
    {
        $params = self::getParams()['post'];
        $user = new User();
        $response = $user->query("Select * from user where email = '".$params['email']."';");
        $response = $response->fetch_assoc();
        if($response==NULL)
        {
            throw new InvalidCredentialsException();
        }

        if($response['password']==$params['password'])
        {
            $user = new User();
            $user->properties = $response;
            //logged in
            //redirect to dashboard
            $_SESSION['user'] = $user;
            header("Location: /dashboard");die;
        }
        throw new InvalidCredentialsException();
    }
}