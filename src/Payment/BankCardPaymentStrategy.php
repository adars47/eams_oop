<?php
namespace App\Payment;

use App\Adapter\HSBCToUSBankAdapter;
use App\Adapter\USBankDebitCard;
use App\Exceptions\PaymentMethodDoesNotExistException;
use App\Model\PaymentDetails;

class BankCardPaymentStrategy implements PaymentStrategyInterface
{

    public function pay(\App\Model\User $user,$amount)
    {
        $payment_deets = $this->collectPaymentDetails($user);
        $payobj = new HSBCToUSBankAdapter(new USBankDebitCard());
        $payobj->formatRequest($payment_deets,$amount);
        $_SESSION['success'][] =[
            "title"=> "booked",
            "message" => "Paid ".$amount." Using Bank Card"
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
        $result = $payment_details->query("Select * from ".$payment_details->table_name." where user_id = ".$uid ." and method='card';");
        $result = $result->fetch_assoc();
        if($result==NULL)
        {
            throw new PaymentMethodDoesNotExistException();
        }

        $payment_details->properties = $result;
        return $payment_details;
    }
}