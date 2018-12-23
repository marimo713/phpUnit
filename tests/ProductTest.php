<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIDIsAnIntegerUsingReflection()
    {
        $product = new Product;

        $reflector = new ReflectionClass(Product::class);

        $property = $reflector->getProperty('product_id');
        $property->setAccessible(true);

        $value = $property->getValue($product);
        $this->assertInternalType('int', $value);
    }

    public function testIDIsAnInteger()
    {
        $product = new Product();
        $this->assertAttributeInternalType('int', 'product_id', $product);
    }
}