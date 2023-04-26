<?php

namespace App\Controller;

use App\Base\Controller;
use App\Exceptions\InvalidCredentialsException;
use App\Model\User;
use App\Notification\BaseNotificationHandler;
use App\Notification\LoggedInNotifier;

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
            $notification_Visitor = new BaseNotificationHandler($user);
            $notification_Visitor->accept(new LoggedInNotifier());
            //redirect to dashboard
            $_SESSION['user'] = $user;
            $_SESSION['success'][] =[
                "title"=> "dashboard",
                "message" => "Welcome to the E-commerce site."
            ];
            session_write_close();
            header("Location: /dashboard");die;
        }
        throw new InvalidCredentialsException();
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header("Location: /login");
    }
}