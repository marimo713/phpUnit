<?php
class FunctionTest extends \PHPUnit\Framework\TestCase
{
    public function testAddReturnsTheCorrectSum()
    {
        require 'function.php';
        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(8, add(3, 5));
    }
    public function testAddDoesNotRetrunTheIncorrentSum()
    {
        $this->assertNotEquals(5, add(2, 2));
    }

}