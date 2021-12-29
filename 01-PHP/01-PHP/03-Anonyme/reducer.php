<?php

$numbers = [1,2,3];

$f = function ($acc, $curr) {
    return "f($acc,$curr)";
};
$sum = function ($acc, $curr) {
    return $acc + $curr;
};

function my_reducer($numbers, $callback, $initial = 0){
    $total = $initial;
    foreach ($numbers as $nbr) {
        $total = $callback($total, $nbr);
    }
    return $total;
}

echo my_reducer($numbers, $f);
echo PHP_EOL;
echo my_reducer($numbers, $sum);

/*
    Soient les données suivantes : en utilisant une classe anonyme hydratez un tableau d'objets, chaque objet aura comme attribut un nom, un prix et une quantité. Puis calculez le total TTC à l'aide de votre reducer.
*/

// $create_class = function ($array) {
//     return new class($array[0], $array[1], $array[2])
//     {
//         public function __construct(
//             public string $name ,
//             public float $price ,
//             public float $quantity
//         ) {}
//     }
// };


$hydrate = function ($array) {
    $result = [];
    foreach ($array as list($name, $price, $quantity) ) {
        $result[] = new class(name: $name, price: $price, quantity: $quantity)
        {
            public function __construct(
                public string $name ,
                public float $price ,
                public float $quantity,
                public float $tva = TVA,
            ) {
            }
        };
    }
    return $result;
};

$callback = function ($acc, $curr) {
    return $acc + $curr;
};

$products = [['milk', 3, 3], ['butter', 2.5, 2],['eggs', .7, 10]];
define('TVA', .2);
var_dump($hydrate($products));

function my_reduce($hydrate, $callback, $init = 0) {
    $total = $init;
    foreach ($hydrate as $nbr) {
        $total = $callback($total, $nbr->price);
    }
    return $total;
} 

echo my_reducer($hydrate($products), function ($acc, $curr) {
    $acc += ($curr->price * $curr->quantity) * ($curr->tva + 1);
    return $acc;
}, 0); // 21


