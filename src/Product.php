<?php

class Product
{
    private $product_id;

    public function __construct()
    {
        $this->product_id = rand();
    }
}