<?php

namespace App\Exceptions;

class PaymentMethodDoesNotExistException extends \Exception
{

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {

        $_SESSION['error'][]= [
            "title"=>"Invalid payment",
            "message"=>"Please re-enter details of your payment method"
        ];
//        echo(json_encode([
//            "Error"=>true,
//            "name"=>"Invalid payment method"
//        ]));
        die;
    }
}