<?php
namespace App\Payment;

use App\Adapter\HSBCToUSBankAdapter;
use App\Adapter\USBankDebitCard;
use App\Exceptions\PaymentMethodDoesNotExistException;
use App\Model\PaymentDetails;

class PaypalPaymentStrategy implements PaymentStrategyInterface
{

    public function pay(\App\Model\User $user,$amount)
    {
        $this->collectPaymentDetails($user);
        $_SESSION['success'][] =[
            "title"=> "booked",
            "message" => "Paid ".$amount." Using paypal"
        ];
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