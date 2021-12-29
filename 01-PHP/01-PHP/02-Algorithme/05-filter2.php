<?php

/**
 * Finir la journée en beauté : notre propre framework de tests !
 * 
 * 1) Renommez vos fonctions de test en séparant les mots par des _
 * Exemple : testItCanFilter devient test_it_can_filter
 * NOTE : Conservez tout de même le mot "test" en premier !
 * 
 * 2) Trouvez un moyen de récupérer toutes les fonctions qui sont définies dans ce fichier
 * 
 * 3) Trouvez un moyen de ne conserver que les fonctions qui commencent par le mot "test"
 * 
 * 4) Exécutez chaque fonction et trouvez le moyen de savoir si elle marche ou pas tout en affichant dans le terminal le résultat (Ca marche ou pas)
 * 
 * 5) Si ça ne marche pas, essayez d'informer le développeur de pourquoi ça marche pas !
 */

function filter(array $arr, callable $fn)
{
    $result = [];
    foreach ($arr as $index => $value) {
        if ($fn($value, $index)) {
            $result[] = $value;
        }
    }
    return $result;
}

function test_we_can_filter_other() {
    $numbers = [2, 20, 1, 15, 11];
    $results = filter($numbers, function ($value) {
        return $value > 10;
    });

    assert(is_array($results));
    assert(count($results) === 3);
    assert($results[0] === 20);
    assert($results[1] === 15);
    assert($results[2] === 11);
}
// test_we_can_filter_other();

function test_we_can_filter_other_way() {
    $numbers = [2, 20, 1, 15, 11];
    $results = filter($numbers, function ($value) {
        return $value < 10;
    });

    assert(count($results) === 1);
    assert($results[0] === 2);
    assert($results[1] === 1);
}
// test_we_can_filter_other_way();






