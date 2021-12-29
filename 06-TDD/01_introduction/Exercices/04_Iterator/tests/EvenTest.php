<?php

use PHPUnit\Framework\TestCase;

use App\Even;

class EvenTest extends TestCase
{
    protected $even;
      
    public function setUp(): void
    {
        $this->even = new Even(100);
    }

    /**
     * @test even is class even
     */
    public function testEvenIsEven()
    {
        $this->assertInstanceOf('App\Even', $this->even);
        
    }

    /**
     * @test even implement Iterator
     */
    public function testEvenImplementIterator()
    {
        // $this->assertInstanceOf('\Iterator', $this->even);
        $this->assertTrue( is_iterable($this->even) );
    }

    /**
     * @test even return even value
     */
    public function testEveResultIsEven()
    {
        foreach($this->even as $n) {
            if ($n !== 0){
                $this->assertTrue( $n % 2 === 0 );
                $this->assertTrue( intval($n&1) === 0 );
            }
        }
    }

}