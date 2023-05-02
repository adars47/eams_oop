<?php
namespace App\Adapter;

use App\Model\PaymentDetails;

interface HSBCPay
{
    function HsbcBankPay($payment_details,$amount,$merchant_details);
    function formatRequest(PaymentDetails $paymentDetails,$amount);
}