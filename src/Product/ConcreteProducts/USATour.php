<?php
namespace App\Product\ConcreteProducts;

class USATour
{

    private $name ="";

    public function __construct($charge, $length, $physical_difficulty, $name)
    {
        $this->charge = $charge;
        $this->length = $length;
        $this->physical_difficulty = $physical_difficulty;
        $this->name = $name;
    }

    public $required_documents = [
        "Citizenship",
        "ContactNumber"
    ];

    public $charge = 0.0;

    public $length = "";

    public $physical_difficulty = 0;
}