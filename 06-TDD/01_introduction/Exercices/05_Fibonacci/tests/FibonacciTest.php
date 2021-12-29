<?php

use PHPUnit\Framework\TestCase;

use App\Fibonacci;

class FibonacciTest extends TestCase
{
    protected $fibonacci;
      
    public function setUp(): void
    {
        $this->fibonacci = new Fibonacci(10);
    }

    /**
     * @test fibonacci is class Fibonacci
     */
    public function testClassIsFibonacci()
    {
        $this->assertInstanceOf('App\Fibonacci', $this->fibonacci);
        
    }

    /**
     * @test fibonacci suite
     */
    public function testSuite()
    {
        $error = false;
        $prev = 0;
        $next = 0;
        $actualy = 0;
        foreach ($this->fibonacci->genSuite() as $key=>$nbr) {
            if ($key === 0){
                if ($nbr !== 0){$error = true;}
            }elseif($key === 1){
                if ($nbr !== 1){$error = true;}
                $actualy = $nbr;
                $next = $actualy + $prev;
                $prev = $nbr;
            }else{
                if ($nbr !== $next){$error = true;}
                $actualy = $nbr;
                $next = $actualy + $prev;
                $prev = $nbr;
            }
        }
        $this->assertFalse($error);
    }
}