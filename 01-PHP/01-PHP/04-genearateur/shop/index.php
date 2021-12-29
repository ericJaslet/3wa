<?php
function genFileKeyValue($file) {

    $f = fopen($file, 'r');
    while($line = fgets($f)) {
        $line = str_replace(["\n", "\r"], '', $line);
        $test = explode( '=', $line ) ;
        yield $test[0] => $test[1];
    }
}
$gen = genFileKeyValue('users.txt');

foreach ($gen as $key => $line) {
    echo "$line : ";
    $sommes = genFileKeyValue('prices.txt');
    foreach($sommes as $somme_key => $somme) {
        if ($somme_key === $key){
            echo $somme;
            break;
        }
    }
    echo PHP_EOL;
}

echo PHP_EOL;