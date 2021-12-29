<?php

require 'vendor/autoload.php';

use UserLogin\ArrayUserStorage;
use UserLogin\RepositoryUser;
use UserLogin\User;

$store = [
    [
        'name'  => 'Bébé',
        'age'   => 1
    ],
    [
        'name'  => 'Eric',
        'age'   => 43
    ],
    [
        'name'  => 'Anne-sophie',
        'age'   => 40
    ],
];

$storage = new ArrayUserStorage();
$storage->addStorage($store);

$user = new User();

$repositoryUser = new RepositoryUser($storage, $user);

$user = $repositoryUser->findOne('Eric');
echo $user;
echo "\n";
$user = $repositoryUser->findOne('Bébé');
echo $user;
echo "\n";
$user = $repositoryUser->findOne('Anne-sophie');
echo $user;
echo "\n";
