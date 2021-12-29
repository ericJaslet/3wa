<?php

use PHPUnit\Framework\TestCase;

use Cart\Cart;
use Cart\MockStorageArray;
use Cart\Product;

class CartTest extends TestCase
{
    protected $cart;
    protected $mockStorageArray;
    protected $product;
    protected $productTwo;
      
    public function setUp(): void
    {
        $this->mockStorage = new MockStorageArray();
        $this->cart= new Cart($this->mockStorage);
        $this->product = new Product('apple', 100.00);
        $this->productTwo = new Product('Microsoft', 200.00);
    }

    public function testMockStorageArrayIsMockStorageClass()
    {
        $this->assertInstanceOf(Cart::class, $this->cart);
    }

    // Single responsalility faire un testMock.php
    // public function testBuy()
    // {
    //     $this->cart->buy($this->product, 1);
    //     $this->assertArrayHasKey($this->product->getName(), $this->mockStorage->getStorage());
    //     $this->assertEquals(120, $this->mockStorage->getStorage()[$this->product->getName()]);
    // }

    public function testBuyTotal()
    {
        $this->cart->buy($this->product, 1);
        $this->assertEquals(120, $this->cart->total());
        $this->assertTrue(is_float($this->cart->total()));
    }

    public function testTwoTotal()
    {
        $this->cart->buy($this->product, 1);
        $this->cart->buy($this->productTwo, 1);
        $this->assertEquals(360, $this->cart->total());
    }

    public function testReset()
    {
        $this->cart->buy($this->product, 1);
        $this->cart->buy($this->productTwo, 1);
        $this->cart->reset();
        $this->assertEquals(0, $this->cart->total());
    }

    public function testRestor()
    {
        $this->cart->buy($this->product, 1);
        $this->cart->buy($this->productTwo, 1);
        $this->cart->restore($this->productTwo);
        $this->assertEquals(120, $this->cart->total());
    }

    public function testRestoreQuantityRestOne()
    {
        $this->cart->buy($this->product, 3);
        $this->cart->restoreQuantity($this->product, 2);
        $this->assertEquals(120, $this->cart->total());
    }

    public function testRestoreQuantityunderZero()
    {
        $this->cart->buy($this->product, 1);
        $this->cart->restoreQuantity($this->product, 2);
        $this->assertEquals(0, $this->cart->total());
    }
}