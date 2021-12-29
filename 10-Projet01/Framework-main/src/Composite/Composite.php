<?php

namespace Souris\Composite;

use Souris\Composite\Component;

/**
 * Class Composite
 * @package Souris\Composite
 */
abstract class Composite extends Component
{
    /**
     * @var \SplObjectStorage
     */
    protected $children;

    /**
     * Composite constructor.
     */
    public function __construct()
    {
        $this->children = new \SplObjectStorage();
    }

    /**
     * @param \Souris\Composite\Component $c
     */
    public function add(Component $c): void
    {
        $this->children->attach($c);
    }

    /**
     * @param \Souris\Composite\Component $c
     */
    public function remove(Component $c): void
    {
        $this->children->detach($c);
    }

    /**
     * @return \SplObjectStorage
     */
    public function get(): \SplObjectStorage
    {
        return $this->children;
    }

    /**
     * @return string
     */
    public function operation(): string
    {
        $composite = "";
        foreach ($this->children as $child) {
            $composite .= $child->operation();
        }

        return $composite;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->operation();
    }
}
