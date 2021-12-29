<?php

namespace Souris\Form;

use Souris\Composite\Component;

/**
 * Class Input
 * @package Souris\Form
 */
class Input extends Component
{
    /**
     * Input constructor.
     * @param string $name
     * @param string $id
     * @param string $type
     */
    public function __construct(
        private string $name = '',
        private string $id = '',
        private string $type = 'text',
    ) {
    }

    /**
     * @param string $n
     * @return $this
     */
    public function setName(string $n)
    {
        $this->name = $n;
        return $this;
    }

    /**
     * @param string $i
     * @return $this
     */
    public function setId(string $i)
    {
        $this->id = $i;
        return $this;
    }

    /**
     * @param string $t
     * @return $this
     */
    public function setType(string $t)
    {
        $this->type = $t;
        return $this;
    }

    /**
     * @return string
     */
    public function operation(): string
    {
        return "<input type='{$this->type}' id='{$this->id}' name='{$this->name}'>";
    }
}
