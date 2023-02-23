<?php

class Product {
    public $name;
    public $code;
    public $price;

    public function __construct($name, $code, $price)
    {
        $this->name = $name;
        $this->code = $code;
        $this->price = $price;
    }
}