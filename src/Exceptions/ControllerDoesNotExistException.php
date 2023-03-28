<?php

namespace App\Exceptions;

class ControllerDoesNotExistException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        echo(json_encode([
            "Error"=>true,
            "name"=>"Controller DOES NOT EXIST"
        ]));
        die;
    }
}