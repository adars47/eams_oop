<?php

namespace App\Product;

use App\Product\ConcreteProducts\NepalTour;

class NepalProductManufacturer extends Product
{
    public function createTours()
    {
        return new NepalTour(49.99,5,5,"Kathmandu Tour");
    }

    public function createSafari()
    {
        return new NepalTour(49.99,5,5,"Kathmandu Tour");
    }
}