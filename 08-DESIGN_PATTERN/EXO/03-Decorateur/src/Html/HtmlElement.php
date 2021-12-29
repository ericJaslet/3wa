<?php

namespace App\Html;

interface HtmlElement
{
    public function __toString();
    public function getName();
}