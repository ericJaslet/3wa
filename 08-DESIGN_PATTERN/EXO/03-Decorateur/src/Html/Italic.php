<?php
namespace App\Html;

use App\Html\HtmlDecorator;

class Italic extends HtmlDecorator
{
    protected $label;
    public function setLabel($label)
    {
        $this->label = $label;
    }
    public function __toString()
    {
        $name = $this->getName();
        return "<em>"
            . $this->element->__toString()
            . "</em>";
    }
}