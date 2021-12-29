<?php
namespace App\Form;
use App\Form\Component;

class Wrapper extends Component
{
    private \SplObjectStorage $elements;

    public function __construct()
    {
        $this->elements = new \SplObjectStorage();
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

    public function __toString()
    {
        $formBody = [];
        foreach ($this->elements as $elt) {
            $formBody[] = $elt->__toString();
        }
        return '<div>' . implode('', $formBody ) . '</div>';
    }
}