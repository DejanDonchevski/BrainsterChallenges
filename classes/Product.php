<?php

namespace MyApp;

class Product 
{
    private $name;
    private $price;
    private $sellingByKg;

    public function __construct(string $name, float $price, bool $sellingByKg)
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->setSellingByKg($sellingByKg);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function getSellingByKg()
    {
        return $this->sellingByKg;
    }

    public function setSellingByKg($sellingByKg)
    {
        $this->sellingByKg = $sellingByKg;

        return $this;
    }

    public function getInfo() 
    {
        return $this->getName() . ", " . $this->getPrice() . ", " . $this->getSellingByKg();
    }

    public function isSellingByKg($object) 
    {
        $info = $object->getSellingByKg();

        if($info)
        {
            echo "This product is sold in kilograms";
        } else {
            echo "This product is sold in gunny sack";
        }
    }
}