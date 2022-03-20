<?php

namespace MyApp;

class MarketStall 
{
    public $products = [];

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }

    public function addProductToMarket(Product $object) 
    {
        array_push($this->products, [$object->getName() => $object]);
    }

    public function getItem(object $arrayKey, $amount) 
    {
        if(in_array($arrayKey, $this->products)) {
            return ['amount' => $amount, 'item' => $arrayKey];
        } else {
            echo "failed";
        }
    }
}