<?php

namespace App\Exceptions;

class DatabaseConnectionException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        echo(json_encode([
            "Error"=>true,
            "name"=>"Database connection failed"
        ]));
        die;
    }
}