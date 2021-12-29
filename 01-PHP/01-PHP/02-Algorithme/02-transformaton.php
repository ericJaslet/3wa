<?php

function transform($nombers):array {
    $nomber_l = count($nombers);
    for($i=0;$i<$nomber_l;$i++) {
        $nombers[$i] = $nombers[$i] * 2; 
    }
    return $nombers;
}

function tesThatTransformWorks() {
    $nombers = [1, 2, 3, 4];
    $transformation = transform($nombers);


    assert(is_array($transformation));
    assert($transformation[0] === 2);
    assert($transformation[1] === 4);
    assert($transformation[2] === 6);
    assert($transformation[3] === 8);
}
tesThatTransformWorks();

/*
    Exo 2
*/

function transformString(array $chaines):array {
    $chaines_l = count($chaines);
    for($i=0;$i<$chaines_l;$i++) {
        $chaines[$i] = strtoupper( $chaines[$i] ); 
    }
    return $chaines;
}

function testThatTransformStringsWorks() {
    $chaines = ['Lior', 'Magali', 'Elise'];

    $transformation = transformString($chaines);
    assert($transformation[0] === 'LIOR');
    assert($transformation[1] === 'MAGALI');
    assert($transformation[2] === 'ELISE');
}
testThatTransformStringsWorks();