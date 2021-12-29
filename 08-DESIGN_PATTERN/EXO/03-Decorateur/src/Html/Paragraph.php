<?php
namespace App\Html;

use App\Html\HtmlDecorator;

class Paragraph extends HtmlDecorator
{
    protected $label;
    public function setLabel($label)
    {
        $this->label = $label;
    }
    public function __toString()
    {
        $name = $this->getName();
        return "<p>"
            . $this->element->__toString()
            . "</p>";
    }
}