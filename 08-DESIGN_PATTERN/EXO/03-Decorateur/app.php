<?php

require_once __DIR__ . '/vendor/autoload.php';


use App\Html\Text;
use App\Html\Italic;
use App\Html\Paragraph;

echo (new Paragraph((new Italic(new Text('hello world')))));
