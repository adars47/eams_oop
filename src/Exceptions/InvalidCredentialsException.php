<?php

namespace App\Exceptions;

class InvalidCredentialsException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {

        $_SESSION['error'][]= [
            "title"=>"Invalid login credentials",
            "message"=>"Please re-enter your credentials"
        ];
        //redirect to /login
        $_SESSION['error'][] =[
            "title"=> "Login Invalid",
            "message" => "InValid Credentials"
        ];
        header("Location: /login");die;
//        echo(json_encode([
//            "Error"=>true,
//            "name"=>"Invalid credentials"
//        ]));

    }
}