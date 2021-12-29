<?php

use PHPUnit\Framework\TestCase;

use App\Calculator;
use App\Model\Add;
use App\Model\Divisor;
use App\Model\Number;
use App\Model\NumberString;

class ModelTest Extends TestCase
{
    protected Add $add;
    protected Divisor $divisor;
    protected Number $a;
    protected Number $b;
    protected NumberString $r;

    public function setUp():void
    {
        $this->add = new Add();
        $this->divisor = new Divisor();
        $this->a = new Number(10.0);
        $this->b = new Number(2.0);
    }

    public function testAdd()
    {
        $num1 = new Number(7);
        $num2 = new Number(8);
        $num3 = new NumberString(15);
        // Pas sames car c'est 2 objets différents
        $this->assertEquals($this->add->add( $num1, $num2 ), $num3 );
    }

    public function testDivisor()
    {
        $num1 = new Number(7);
        $num2 = new Number(8);
        $num3 = new NumberString(7/8);
        // Pas sames car c'est 2 objets différents
        $this->assertEquals($this->divisor->division( $num1, $num2 ), $num3 );
    }

    /**
     * @test Exception division by zero
     */
    public function testExceptionByZero():void
    {
        $num1 = new Number(7);
        $num2 = new Number(0);
        $this->expectException(\DivisionByZeroError::class);
        $this->divisor->division( $num1, $num2 );
    }


    // public function testAdd()
    // {
    //     $this->r = new NumberString(12.0);
    //     $this->add = new Add();
    //     $this->assertEquals( $this->r, $this->add->add( $this->a, $this->b ) );
    // }

    // public function testDivisor()
    // {
    //     $this->r = new NumberString(5.0);
    //     $this->divisor = new Divisor($this->a, $this->b );
    //     $this->assertEquals( $this->r, $this->divisor );
    // }

    // public function testExceptionDivisor()
    // {

    // }
}