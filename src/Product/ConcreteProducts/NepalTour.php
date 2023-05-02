<?php

namespace App\Product\ConcreteProducts;

class NepalTour
{
    private $tourType;

    public function __construct($charge, $length, $physical_difficulty, $name, $tourType)
    {
        $this->charge = $charge;
        $this->length = $length;
        $this->physical_difficulty = $physical_difficulty;
        $this->name = $name;
        $this->tourType = $tourType;
    }

    public $required_documents = [
            "Citizenship",
            "ContactNumber"
    ];

    public $name = "";
    public $charge = 0.0;

    public $length = "";

    public $physical_difficulty = 0;

}