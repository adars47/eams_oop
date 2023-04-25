<?php

namespace App\Exceptions;

class InvalidCredentialsException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        echo(json_encode([
            "Error"=>true,
            "name"=>"Invalid credentials"
        ]));
        die;
    }
}