<?php
namespace App\Payment;

interface PaymentStrategyInterface
{
    public function pay(\App\Model\User $user,$amount);

    public function validatePaymentDetails();

    public function collectPaymentDetails(\App\Model\User $user);
}