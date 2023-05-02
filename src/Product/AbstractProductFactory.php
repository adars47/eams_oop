<?php
namespace App\Product;

abstract class AbstractProductFactory
{

    public abstract function createTours($charge,$length,$difficulty,$name);

    public abstract function createSafari($charge,$length,$difficulty,$name);

}