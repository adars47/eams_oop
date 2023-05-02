<?php

namespace App\Product;

use App\Product\ConcreteProducts\NepalTour;

class NepalAbstractProductManufacturerFactory extends AbstractProductFactory
{
    public function createTours($charge,$length,$difficulty,$name)
    {
        $tourType = ProductType::get('tour');
        return new NepalTour($charge,$length,$difficulty,$name,$tourType);
    }

    public function createSafari($charge,$length,$difficulty,$name)
    {
        $tourType = ProductType::get('safari');
        return new NepalTour($charge,$length,$difficulty,$name,$tourType);
    }
}