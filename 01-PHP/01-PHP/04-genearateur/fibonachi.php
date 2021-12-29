<?php
// 0 1 1 2 3 5 8 13 21 34 55 89 
/*
function getFibonacci($n){
    yield 0;
    yield $prev = 1;
    yield $actu = 1;
    for ($i = 2; $i <= $n-2; $i++) {
        yield $next = $prev + $actu;
        $prev = $actu;
        $actu = $next;
    }
}

$n = 12;
foreach (getFibonacci($n) as $fibonacci) {
    echo $fibonacci . PHP_EOL;
}
*/

function genOne($nbr) {
    for ($y=0; $y<$nbr; $y++){
        yield 1;
    }
}

function genNbr($n) {
    for ($i=0; $i<$n; $i++) {
        if ($i % 3 === 0){
            yield from genOne($i);
        }else{
            yield $i;
        }
    }
}

$n = 10;
foreach (genNbr($n) as $nbr) {
    echo $nbr . PHP_EOL;
}