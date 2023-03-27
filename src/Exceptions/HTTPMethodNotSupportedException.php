<?php

namespace App\Exceptions;

class HTTPMethodNotSupportedException extends \Exception
{
    //todo implement this error generation
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        echo(json_encode([
            "Error"=>true
        ]));
        die;
    }
}