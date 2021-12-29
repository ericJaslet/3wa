<?php

$a = 1;
$b = 2;
$c = 3;

function permute (&$a, &$b, &$c) {
    $temp = $a;
    $a = $b;
    $b = $c;
    $c = $temp;
}

permute($a, $b, $c);

echo "a -> $a\nb -> $b\nc -> $c";

// correction
echo PHP_EOL . "Correction";

list($a, $b, $c) = [1, 2, 3];

echo $a, $b, $c . PHP_EOL;
function permuteTwo (&$a, &$b, &$c) {
    list ($a, $b, $c) = [$b, $c, $a];
}
permuteTwo($a, $b, $c);
echo "$a, $b, $c";

// 