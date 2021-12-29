<?php

use PHPUnit\Framework\TestCase;

use App\Calculator;
use Providers\TraitProvider;

class CalculatorTest Extends TestCase
{
    use TraitProvider;
    protected Calculator $calculator;


    public function setUp():void
    {
        $this->calculator = new Calculator(2);
    }

    /**
     * @test testAdd object Calculator Exists
     */
    public function testInstanceOfCalculator():void
    {
        $this->assertInstanceOf(Calculator::class, $this->calculator);
    }

    /**
     * @dataProvider additionEqualProvider
     */
    public function testEqualAdd($a, $b, $expected):void
    {
        // $this->assertSame($expected, $this->calculator->add( $a, $b) );
        $this->assertEquals($expected, $this->calculator->add( $a, $b) );
    }

    /**
     * @dataProvider additionSameProvider
     */
    public function testSameAdd($a, $b, $expected):void
    {
        $this->assertSame($expected, $this->calculator->add( $a, $b) );
    }



    /**
     * @dataProvider divisorEqualProvider
     */
    public function testEqualsDivision($a, $b, $expected)
    {
        $this->assertEquals($expected, $this->calculator->division( $a, $b) );
    }

    /**
     * @dataProvider divisorSameProvider
     */
    public function testSameDivision($a, $b, $expected)
    {
        $this->assertSame($expected, $this->calculator->division( $a, $b) );
    }

    /**
     * @test Exception division by zero
     */
    public function testExceptionByZero():void
    {
        $this->expectException(\DivisionByZeroError::class);
        $this->calculator->division(3, 0);
    }

    /**
     * @test Exception division by zero
     */
    public function testExceptionMessageByZero():void
    {
        $this->expectExceptionMessage("Impossible de diviser par zéro");
        $this->calculator->division(3, 0);
    }
}