<?php

namespace App\Discount;

class BaseDiscount implements Discount
{
    public $base_discount=0.0;

    public function amount()
    {
        return $this->base_discount;
    }

    public function description()
    {
        return "Base discount";
    }
}