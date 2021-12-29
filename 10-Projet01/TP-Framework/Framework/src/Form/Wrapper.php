<?php

namespace Souris\Form;

use Souris\Composite\Component;

class Wrapper extends Component
{

    protected \SplObjectStorage $children;

    public function __construct() {

        $this->children = new \SplObjectStorage;
    }

    public function add(Component $c): void
    {
        $this->children->attach($c);
    }

    public function remove(Component $c): void
    {
       $this->children->detach($c);
    }

    public function get(): \SplObjectStorage{

        return $this->children;
    }

    public function operation(): string
    {
        $results = "<div>";
        foreach ($this->children as $child) {
            $results = $results.$child->operation();
        }
        return $results."\n"."</div>";
    }

}