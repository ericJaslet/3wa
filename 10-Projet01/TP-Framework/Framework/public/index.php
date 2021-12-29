<?php

require_once __DIR__.'/../app.php';

use Souris\Dispatcher;

$dispatcher = new Dispatcher($container);
$dispatcher->run();


