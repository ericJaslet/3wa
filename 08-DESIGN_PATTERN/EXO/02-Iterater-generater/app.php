<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Model\Person;

$storage = new Ds\Map();

// $person = new Person('Eric');

$population = new SplFileObject(__DIR__ . DIRECTORY_SEPARATOR . 'Data/populations.txt');

foreach($population as $key => $person) {
    $arrayPerson = explode(',', $person);
    $storage->put((int)$arrayPerson[0], new Person($arrayPerson[1], trim($arrayPerson[0]) ) );
}

// var_dump( $storage->get(0) );

$relationShip = new SplFileObject(__DIR__ . DIRECTORY_SEPARATOR . 'Data/relationships.txt');

foreach($relationShip  as $relation) {
    // echo $relation;
    $arrayRealtion = explode(',', $relation);
    $storage->get( (int)$arrayRealtion[0] )->addRelation(trim( $arrayRealtion[1]) );
    $storage->get( (int)$arrayRealtion[1] )->addRelation(trim( $arrayRealtion[0]) );
}

var_dump($storage->get(4));


