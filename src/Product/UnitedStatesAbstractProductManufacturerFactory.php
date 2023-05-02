<?php

namespace App\Product;

use App\Product\ConcreteProducts\NepalTour;
use App\Product\ConcreteProducts\USATour;

class UnitedStatesAbstractProductManufacturerFactory extends AbstractProductFactory
{

    public function createTours($charge,$length,$difficulty,$name)
    {
        return new USATour($charge,$length,$difficulty,$name);

    }

    public function createSafari($charge,$length,$difficulty,$name)
    {
        return new USATour($charge,$length,$difficulty,$name);
    }
}