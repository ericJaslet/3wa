<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Form\Form;
use App\Form\Input;
use App\Form\Wrapper;

$form = new Form(name : 'user', action : "/add");
$form->add(new Input('name', "Name", 'text'));
$form->add(new Input('description', "Description", 'text'));

$wrapper = new Wrapper();
$wrapper->add(new Input('caption', "Caption", 'text'));
$wrapper->add(new Input('image', "Image", 'file'));

$form->add($wrapper);

echo $form . "\n";