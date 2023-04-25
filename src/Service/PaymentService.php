<?php

namespace App\Service;

use App\Model\User;
use App\Payment\PaymentStrategyInterface;

class PaymentService
{
    private PaymentStrategyInterface $paymentStrategy;

    public function setPaymentStrategy(PaymentStrategyInterface $paymentStrategy)
    {
        $this->paymentStrategy= $paymentStrategy;
    }

    public function pay(User $user,$amount)
    {
        $this->paymentStrategy->pay($user,$amount);
    }

}