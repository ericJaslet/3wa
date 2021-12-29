<?php

// 1. Fonction définie
function hello(string $name = "world") { echo "Hello $name !". PHP_EOL;}
// 2. Le nom d'une foncton definie

// 3. une fonction anomyme(Closure)
$mafonction = function (string $name = "world") { echo "Hello $name !". PHP_EOL;};

// 4. un tableau qui référence un objet et le nom d'une méthode
// [$instance, 'hello']()

function afficherAvecEcho(string $str) {
    echo $str . PHP_EOL;
}

function afficherAvecDump(string $str) {
    var_dump($str);
}

function additionnerEtAfficherLeResultat(int $a, int $b, callable $afficher) {
    $resultat = $a + $b;
    $afficher("Le résultat est $resultat");
    
}


additionnerEtAfficherLeResultat(10, 5, 'afficherAvecEcho');

$affichager = 'afficherAvecEcho';

additionnerEtAfficherLeResultat(10, 5, $affichager);

additionnerEtAfficherLeResultat(10, 5, function (string $str) {
    echo $str . PHP_EOL;
});



/* 
function transformNumbers($nombers):array {
    $nomber_l = count($nombers);
    for($i=0;$i<$nomber_l;$i++) {
        $nombers[$i] = $nombers[$i] * 2; 
    }
    return $nombers;
}
function transformString(array $chaines):array {
    $chaines_l = count($chaines);
    for($i=0;$i<$chaines_l;$i++) {
        $chaines[$i] = strtoupper( $chaines[$i] ); 
    }
    return $chaines;
}
*/
// Créer une fonction transform à laquelle vous pourrezpasser une fonction de transformation
// Elle devrait pouvoir travailler autant sur un tableau de strings que sur un tableau de nombres
// Et elle devrait appliquer la transformaton voulue



function transform(array $arr, callable $fn) {
    $transformation = [];
    foreach($arr as $index => $value) {
        $transformation[] = $fn($value, $index);
    }
    return $transformation;
}
$numbers = [1, 2, 3, 4];
$result = transform($numbers, function(int $n) {
    return $n * 2;
});

assert(is_array($result));
assert($result[0] === 2);
assert($result[1] === 4);
assert($result[2] === 6);
assert($result[3] === 8);






/*
// Créer une fonction transform à laquelle vous pourrez passer une fonction de transformation
// Elle devrait pouvoir travailler autant sur un tableau de strings que sur un tableau de nombres
// Et elle devrait appliquer la transformation voulue

function transform(array $arr, callable $fn): array
{
    $transformation = [];

    foreach ($arr as $index => $value) {
        $transformation[] = $fn($value, $index);
    }

    return $transformation;
}

$numbers = [1, 2, 3, 4];

$resultat = array_map(function (int $n) {
    return $n * 2;
}, $numbers);

assert(is_array($resultat));
assert($resultat[0] === 2);
assert($resultat[1] === 4);
assert($resultat[2] === 6);
assert($resultat[3] === 8);

$strings = ['Lior', 'Magali', 'Elise'];

$resultat = transform($strings, function (string $str) {
    return strtoupper($str);
});
assert($resultat[0] === 'LIOR');
assert($resultat[1] === 'MAGALI');
assert($resultat[2] === 'ELISE');
*/