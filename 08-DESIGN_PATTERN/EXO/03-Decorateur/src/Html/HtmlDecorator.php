<?php

namespace App\Html;
use App\Html\HtmlElement;

abstract class HtmlDecorator implements HtmlElement
{
    public function __construct(protected HtmlElement $element)
    {}

    public function getName()
    {
        return $this->element->getName();
    }
}