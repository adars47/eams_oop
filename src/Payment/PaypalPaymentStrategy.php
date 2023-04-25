<?php
namespace App\Payment;

use App\Exceptions\PaymentMethodDoesNotExistException;
use App\Model\PaymentDetails;

class PaypalPaymentStrategy implements PaymentStrategyInterface
{

    public function pay(\App\Model\User $user,$amount)
    {
        $this->collectPaymentDetails($user);
        var_dump("PAID ".$amount,"USING PAYPAL");die;
        // TODO: Implement pay() method.
    }

    public function validatePaymentDetails()
    {
        // TODO: Implement validatePaymentDetails() method.
    }

    public function collectPaymentDetails(\App\Model\User $user)
    {
        $uid = $user->properties['id'];
        $payment_details = new PaymentDetails();
        $result = $payment_details->query("Select * from ".$payment_details->table_name." where user_id = ".$uid ." and method='paypal';");
        $result = $result->fetch_assoc();
        if($result==NULL)
        {
            throw new PaymentMethodDoesNotExistException();
        }

        $payment_details->properties = $result;
        // TODO: Implement collectPaymentDetails() method.
    }
}