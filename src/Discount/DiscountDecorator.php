<?php

namespace App\Discount;

abstract class DiscountDecorator implements  Discount
{
    public $desc = "Discount for";
}