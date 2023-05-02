<?php

namespace App\Adapter;

use App\Model\PaymentDetails;

class USBankDebitCard implements UsBank
{

    function UsBankPay($payment_details, $amount, $merchant_details)
    {
        $_SESSION['success'][]=[
            "title"=>"API Call made to us bank",
            "message"=>"Send payment information to us bank."
        ];
     }

    function formatRequest(PaymentDetails $paymentDetails, $amount,$apiKey)
    {
        $this->UsBankPay(json_decode($paymentDetails->properties['details'],true),$amount,$apiKey);
    }
}