<?php

namespace App\Product;

class ProductType
{
    private static array $Cache = [];
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function get($name)
    {
        self::$Cache[$name] ??= new self($name);
        return self::$Cache[$name];
    }

    public function __toString(): string
    {
        return $this->name;
    }
}