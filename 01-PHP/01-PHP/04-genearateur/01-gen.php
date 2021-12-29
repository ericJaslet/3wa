<?php
/*
function gen(){
    for ($i = 2; $i <= 10; $i+=2) {
        yield $i;
    }
}

$generator = gen();

function genOdd($generator) {
    foreach($generator as $value) {
        echo $value . PHP_EOL;
    }
}

genOdd($generator);

// 2. Ecrire une fonction génératrice qui affiche les nombres pairs inférieur à $n un entier

function gen0ddN(int $value) {
    for ($i = 2; $i <= $value; $i+=2) {
        if ($value % 2 === 0) {
            yield $i;
        }
    }
}

function genOddLimit($generator) {
    foreach($generator as $value) {
        echo $value . PHP_EOL;
    }
}
$limit = 8;
$generator = gen0ddN($limit);

genOddLimit($generator);
*/

// Recoder le range avec un generateur.

function xrange (int $start, int $limit, int $step = 1 ){
    for ($i = $start; $i < $limit; $i+=$step) {
        yield $i;
    }
}
$genX = xrange(3, 25, 5);
foreach ($genX as $key => $value) {
    echo $key . " => " . $value . PHP_EOL;
}