<?php

namespace App\Product;

use App\Product\ConcreteProducts\NepalTour;

class UnitedStatesAbstractProductManufacturerFactory extends AbstractProductFactory
{

    public function createTours($charge,$length,$difficulty,$name)
    {
        return new NepalTour($charge,$length,$difficulty,$name);

    }

    public function createSafari($charge,$length,$difficulty,$name)
    {
        return new NepalTour($charge,$length,$difficulty,$name);
    }
}