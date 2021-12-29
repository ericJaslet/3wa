<?php

namespace Souris\Form;

use Souris\Composite\Component;

/**
 * Class Wrapper
 * @package Souris\Form
 */
class Wrapper extends Component
{
    /**
     * @var \SplObjectStorage
     */
    protected \SplObjectStorage $children;

    /**
     * Wrapper constructor.
     */
    public function __construct()
    {
        $this->children = new \SplObjectStorage;
    }

    /**
     * @param Component $c
     */
    public function add(Component $c): void
    {
        $this->children->attach($c);
    }

    /**
     * @param Component $c
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
        $results = "<div>";
        foreach ($this->children as $child) {
            $results = $results . $child->operation();
        }
        return $results . "\n" . "</div>";
    }
}
