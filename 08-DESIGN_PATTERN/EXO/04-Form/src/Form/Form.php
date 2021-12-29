<?php

namespace App\Form;

use \SplObjectStorage;
use App\Form\Component;

class Form extends Component
{
    private SplObjectStorage $elements;

    public function __construct(
        private string $name,
        private string $action,
    )
    {
        $this->elements = new SplObjectStorage();
    }

    public function add(Component $c): void
    {
        $this->elements->attach($c);
    }

    public function remove(Component $c): void
    {
       $this->elements->detach($c);
    }

    public function get(): \SplObjectStorage{

        return $this->elements;
    }

    public function __toString(): string
    {
        $formBody = [];
        foreach ($this->elements as $elt) {
            $formBody[] = $elt->__toString();
        }
        return '<form name="'. $this->name .'" action="'. $this->action .'" method="GET">'. implode('', $formBody ) .'<input type="submit" value="Send"></form>';
    }
}