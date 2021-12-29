<?php

namespace Souris\Composite;

use Souris\Composite\Component;

abstract class Composite extends Component
{
    protected $children;

    public function __construct()
    {
        $this->children = new \SplObjectStorage();
    }

    public function add(Component $c): void
    {
        $this->children->attach($c);
    }

    public function remove(Component $c): void
    {
        $this->children->detach($c);
    }

    public function get(): \SplObjectStorage
    {
        return $this->children;
    }

    public function operation(): string
    {
        $composite = "";
        foreach ($this->children as $child) {
            $composite .= $child->operation();
        }

        return $composite;
    }

    public function toString()
    {
        return $this->operation();
    }
}