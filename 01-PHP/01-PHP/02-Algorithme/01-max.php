<?php

$nombres = [4, 10, 3, 1, 20, 5];

function getMaxNumber(array $nombers): int {
    $max = -INF;
    foreach($nombers as $nbr){
        $max = ($max < $nbr) ? $nbr : $max;
    }
    return $max;
}

$max = getMaxNumber($nombres);
echo $max;
assert($max === 20);
