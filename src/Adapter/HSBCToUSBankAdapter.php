<?php

namespace App\Adapter;

use App\Model\PaymentDetails;

class HSBCToUSBankAdapter implements HSBCPay
{
    private UsBank $usBank;

    public function __construct(UsBank $usBank)
    {
        $this->usBank = $usBank;
    }

    function HsbcBankPay($payment_details, $amount, $merchant_details)
    {
        $this->usBank->UsBankPay($payment_details,$amount,$merchant_details);
    }

    function formatRequest(PaymentDetails $paymentDetails, $amount)
    {
        $this->usBank->formatRequest($paymentDetails,$amount,$_ENV['usBankApiKey']);
    }
}