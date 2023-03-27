<?php

namespace App\Exceptions;

class MethodDoesNotExistException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        echo(json_encode([
            "Error"=>true
        ]));
        die;
    }
}