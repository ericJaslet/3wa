<?php

use PHPUnit\Framework\TestCase;

use App\Cart\{Cart, Product};
use App\Observers\LogSum;

class CartTest extends TestCase
{
    protected Cart $cart;
    protected Product $productOne;
    protected LogSum $LogSum;
    private string $directory;

    public function setUp(): void
    {
        $this->cart = New Cart([]);
        $this->productOne = new Product('apple', 1000);
        $this->productTwo = new Product('microsoft', 100);

        $this->directory = __DIR__ . DIRECTORY_SEPARATOR . '_data'. DIRECTORY_SEPARATOR;
        $this->logSum = new LogSum('logsum.txt', $this->directory);

        $this->cart->attach($this->logSum);
    }

    /**
     * @test even is class even
     */
    public function testCartIsCart()
    {
        $this->assertInstanceOf('App\Cart\Cart', $this->cart);
    }

    public function testSum()
    {
        $this->cart->buy($this->productOne, 2);
        $sum = file_get_contents(__DIR__ . '/../src/Observers/logsum.txt');
        $this->assertEquals(2400, $sum);
    }




}