<?php
/*
function genFile($file){

    $f = fopen($file, 'r');

    while($line = fgets($f)) yield $line;

    fclose($f);
}

$gen = genFile('./content.txt');

foreach($gen as $line) echo $line;

echo PHP_EOL;
*/
/*
function genFileOdd($file, $modulo = 2){

    $f = fopen($file, 'r');
    while($line = fgets($f)) {
        if ( intval($line) % $modulo === 0 ) {
            yield $line;
        }
    }
}

$gen = genFileOdd('./char.txt', 2);

foreach($gen as $line) echo $line;

echo PHP_EOL;
*/

function genFileKeyValue($file) {

    $f = fopen($file, 'r');
    while($line = fgets($f)) {
        $test = explode( '=', $line ) ;
        yield $test[0] => $test[1];
    }
}
$gen = genFileKeyValue('contenu_key.txt');

foreach($gen as $key => $line) echo "$key => $line";

echo PHP_EOL;