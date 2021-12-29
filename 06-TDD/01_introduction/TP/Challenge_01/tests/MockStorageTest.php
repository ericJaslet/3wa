<?php

use PHPUnit\Framework\TestCase;

use Cart\MockStorageArray;

class MockStorageArrayTest extends TestCase
{
    protected $mockStorageArray;
      
    public function setUp(): void
    {
        $this->mockStorageArray = new MockStorageArray();
    }

    public function testMockStorageArrayIsMockStorageClass()
    {
        $this->assertInstanceOf('Cart\MockStorageArray', $this->mockStorageArray);
    }
}