<?php

namespace App\Exceptions;

class ViewDoesNotExistException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        echo(json_encode([
            "Error"=>true,
            "name"=>"VIEW DOES NOT EXIST"
        ]));
        die;
    }
}