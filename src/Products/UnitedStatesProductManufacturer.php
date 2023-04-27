<?php

namespace App\Product;

use App\Product\ConcreteProducts\NepalTour;

class UnitedStatesProductManufacturer extends Product
{

    public function createTours()
    {
        return new NepalTour(49.99,5,5,"New york tour");

    }

    public function createSafari()
    {
        return new NepalTour(49.99,5,5,"Mankato safari");
    }
}