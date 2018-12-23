<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected static $queue;

    public static function setUpBeforeClass()
    {
        // use for DB, message connect etc
        static::$queue = new Queue;
    }

    public static function tearDownAfterClass()
    {
        // use for DB, message dissconnect etc
        static::$queue = null;
    }

    protected function setUp()
    {
        //static::$queue = new Queue();
        static::$queue->clear();
    }
    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$queue->getCount());
    }

    protected function tearDown()
    {
        // useualy use for delete tmp file.etc
        //unset(static::$queue);
    }


    public function testAnItemIsAddedTheQueue()
    {
        static::$queue->push('green');

        $this->assertEquals(1, static::$queue->getCount());

    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        static::$queue->push('green');
        $item = static::$queue->pop();
        $this->assertEquals(0, static::$queue->getCount());
        $this->assertEquals('green', $item);
    }

    public function testAnItemRemoveFromTheFrontOfTheQueue()
    {
        static::$queue->push('first');
        static::$queue->push('second');

        $this->assertEquals('first', static::$queue->pop());
    }
    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
    }

    public function testExceptionTrownWhenAddingItemToAFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }

        $this->expectException(QueueException::class);
        $this->expectExceptionMessage('Queue is full');
        static::$queue->push('wafer thin mint');
    }
}