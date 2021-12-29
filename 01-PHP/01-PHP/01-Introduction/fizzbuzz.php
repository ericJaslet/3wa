<?php

/*
En utilisant l'expression match de PHP implémentez l'algorithme de FizzBuzz :

Pour les nombres de 1 à 100 compris.

Pour les multiples de 3, affichez Fizz au lieu du nombre.
Pour les multiples de 5, affichez Buzz au lieu du nombre.
Pour les nombres multiples de 3 et 5, affichez uniquement FizzBuzz.
*/
/*
namespace SolutionOne{
    function my_modulo(int $nbr): string | int {
        if ( ($nbr % 3 === 0) && ($nbr % 5 === 0) ){
            return 'fizzbuzz';
        }else if ($nbr % 3 === 0) {
            return 'fizz';
        }else if($nbr % 5 === 0) {
            return 'buzz';
        }
        return $nbr;
    }
    
    $loop = 100;
    while ($loop >= 1 ) {
    
        $number = match( my_modulo($loop) ) {
            'fizzbuzz' => "Fizzbuzz",
            'fizz' => "Fizz",
            'buzz' => "Buzz",
            default => $loop
        };
    
        echo PHP_EOL . $number;
    
        $loop --;
    }
    echo PHP_EOL;
}
*/

namespace SolutionTwo {
    for ($i=0;$i<30;$i++) {
        $number = match (true) {
            (($i % 3 === 0) && ($i % 5 === 0)) => "Fizzbuzz",
            ($i % 3 === 0) => "Fizz",
            ($i % 5 === 0) => "Buzz",
            default => $i
        };
        echo PHP_EOL . $number;
    }
}












/*
namespace SolutionThree {
    function fizzbuzz($num) {
        print match (0) {
            $num % 15 => "FizzBuzz" . PHP_EOL,
            $num % 3  => "Fizz" . PHP_EOL,
            $num % 5  => "Buzz" . PHP_EOL,
            default   => $num . PHP_EOL,
        };
    }
    
    for ($i = 0; $i <=100; $i++)
    {
        fizzbuzz($i);
    }
}
*/