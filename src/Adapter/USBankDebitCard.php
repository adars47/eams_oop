<?php

namespace App\Adapter;

use App\Model\PaymentDetails;

class USBankDebitCard implements UsBank
{

    function UsBankPay($payment_details, $amount, $merchant_details)
    {
        // TODO: Implement UsBankPay() method.
    }

    function formatRequest(PaymentDetails $paymentDetails, $amount,$apiKey)
    {
        $this->UsBankPay(json_decode($paymentDetails->properties['details'],true),$amount,$apiKey);
    }
}