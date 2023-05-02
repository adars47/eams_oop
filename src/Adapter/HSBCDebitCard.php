<?php

namespace App\Adapter;

use App\Model\PaymentDetails;

class HSBCDebitCard implements HSBCPay
{

    function HsbcBankPay($payment_details, $amount, $merchant_details)
    {
        $_SESSION['success'][]=[
            "title"=>"API Call made to hsbc",
            "message"=>"Send payment information to HSBC."
        ];
    }

    function formatRequest(PaymentDetails $paymentDetails, $amount)
    {
        $this->HsbcBankPay(json_decode($paymentDetails['HSBCBankApiKey'],true),$amount,$_ENV['payment_details']);
    }
}