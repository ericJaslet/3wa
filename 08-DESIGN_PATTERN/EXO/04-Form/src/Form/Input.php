<?php

namespace App\Form;

use App\Form\Component;

class Input extends Component
{
    public function __construct(
        private string $name,
        private string $type
    ) {}

    public function __toString(): string
    {
        return '<input type="'. $this->type .'" name="'.$this->name.'">';
    }
}