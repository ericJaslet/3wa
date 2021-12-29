<?php
/*
require_once './Calculator.php';

$calc = new Calculator();

echo $calc->addition(21, 4.0009);
echo PHP_EOL;
echo $calc->multiplication(5, 5);
echo PHP_EOL;
echo $calc->division(1, 3);
echo PHP_EOL;
echo $calc->somme2(10, 4, 5, 10, 1);
echo PHP_EOL;
// echo $calc->division(100, 0);
echo PHP_EOL;
*/

require_once './CalculatorTwo.php';
$calc2 = new CalculatorTwo();

try{
    echo $calc2->result([[21, 4],['+']]);
    echo PHP_EOL;
    echo $calc2->result([[100, 4],['/']]);
    echo PHP_EOL;
    echo $calc2->result([[2],['*']]);
    echo PHP_EOL;
    echo $calc2->result([[2, 3, 20],['S']]);
    echo PHP_EOL;
    echo $calc2->result([[2, 3, 20],['']]);
    echo PHP_EOL;
}catch (TypeError | DivisionByZeroError | Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    echo "Oups " . PHP_EOL;
}
