<?php

use PHPUnit\Framework\TestCase;

use App\Narcissique;

class NarcissiqueTest extends TestCase
{
    protected $narcissique;
      
    public function setUp(): void
    {
        $this->narcissique = new Narcissique();
    }

    /**
     * @test narcissique is class Narcissique
     */
    public function testClassIsNarcissique()
    {
        $this->assertInstanceOf('App\Narcissique', $this->narcissique);
        
    }

    /**
     * @test narcissique number
     */
    public function testSuite()
    {
        $nbr = (string)$this->narcissique->getNumber(153);
        $result = 0;
        $power = strlen($nbr);

        for ($i=0; $i < $power; $i++) {
            $result += intval($nbr[$i]) ** $power;
        }

        $this->assertEquals($nbr, $result);
    }
}