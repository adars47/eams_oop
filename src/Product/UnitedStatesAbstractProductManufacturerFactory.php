<?php

namespace App\Product;

use App\Product\ConcreteProducts\NepalTour;
use App\Product\ConcreteProducts\USATour;

class UnitedStatesAbstractProductManufacturerFactory extends AbstractProductFactory
{

    public function createTours($charge,$length,$difficulty,$name)
    {
        $tourType = ProductType::get('tour');
        return new USATour($charge,$length,$difficulty,$name,$tourType);

    }

    public function createSafari($charge,$length,$difficulty,$name)
    {
        $tourType = ProductType::get('safari');
        return new USATour($charge,$length,$difficulty,$name,$tourType);
    }
}