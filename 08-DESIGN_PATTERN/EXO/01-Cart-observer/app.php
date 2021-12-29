<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Cart\Cart;
use App\Cart\Product;
use App\Observers\{LogFile, LogSum};

$apple = new Product('apple', 1000);
$microsoft = new Product('microsoft', 100);

$cart = new Cart([]);

// Observers
$logFile = new LogFile;
$logSum = new LogSum('logsum.txt', './');

$cart->attach($logSum);

// Ajoutez des produits ...

$cart->buy($apple, 2);

// detach Observer
$cart->detach($logSum);
$cart->detach($logFile);

// $cart->buy($microsoft, 2);