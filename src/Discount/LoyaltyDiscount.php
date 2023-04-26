<?php

namespace App\Discount;

class LoyaltyDiscount extends DiscountDecorator
{

    public Discount $discount;

    private $discount_amount = 0.50;

    public function __construct(Discount $discount)
    {
        $this->discount = $discount;
    }

    public function amount()
    {
        return $this->discount->amount() + $this->discount_amount;
    }

    public function description()
    {
        return $this->discount->description() . " Loyalty discount";
    }
}