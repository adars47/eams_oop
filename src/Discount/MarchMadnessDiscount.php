<?php

namespace App\Discount;

class MarchMadnessDiscount extends DiscountDecorator
{

    public Discount $discount;

    private $discount_amount = 1.00;

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
        return $this->discount->description() . "March Madness discount";
    }
}