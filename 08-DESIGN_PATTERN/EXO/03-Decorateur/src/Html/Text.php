<?php

namespace App\Html;

class Text implements HtmlElement
{
    public function __construct(protected string $name)
    {}

    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }
}