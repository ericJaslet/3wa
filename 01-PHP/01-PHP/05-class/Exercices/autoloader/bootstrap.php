<?php
/*
spl_autoload_register(function($classname){
    var_dump($classname);
    die;
});

// $a = new App\A;
// $b = new App\B;
$c = new App\Utils\C;
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// composer dump-autoload
// après chaque modification du compooser.json
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

require_once __DIR__ . '/vendor/autoload.php';

$a = new App\A;
$b = new App\B;
$c = new App\Utils\C;