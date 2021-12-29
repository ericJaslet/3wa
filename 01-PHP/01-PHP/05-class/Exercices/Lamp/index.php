<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Button as Button;
use App\Lamp as Lamp;

$lamp = new Button(new Lamp);

echo $lamp->switchDevice(); // turn on
echo $lamp->switchDevice(); // turn off
echo $lamp->switchDevice(); // turn on
echo $lamp->switchDevice(); // turn off