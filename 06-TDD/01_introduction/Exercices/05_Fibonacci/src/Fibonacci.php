<?php

namespace App;

class Fibonacci
{
    public function __construct (
        private int $n = 0
        )
    {
        $this->genSuite();
    }

    public function genSuite()
    {
        yield 0;
        $cur = 1;
        $prev = 0;
        for ($i = 0; $i < $this->n; $i++) {
            yield $cur;

            $temp = $cur;
            $cur = $prev + $cur;
            $prev = $temp;
        }
    }

    
    public function genSimpleSuite($n)
    {
        $num1 = 0;
        $num2 = 1;
        $counter = 0;
        echo "\n =>";
        while ($counter < $n) {
            echo ' '.$num1;
            $num3 = $num2 + $num1;
            [$num1, $num2] = [$num2, $num3];
            $counter = $counter + 1;
        }
    }
}