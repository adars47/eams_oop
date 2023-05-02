<?php

namespace App\Adapter;

use App\Model\PaymentDetails;

interface UsBank
{
    function UsBankPay($payment_details,$amount,$merchant_details);
    function formatRequest(PaymentDetails $paymentDetails,$amount,$apiKey);
}