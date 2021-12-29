<?php

namespace Souris\Form;

use Souris\Composite\Component;

class Input extends Component {

    public function __construct(
        private string $name='',
        private string $id='',
        private string $type='text',
    ) {}

    public function setName ( string $n)  {
        $this->name = $n;
        return $this;
    }

    public function setId ( string $i ) {
        $this->id = $i;
        return $this;
    }
    public function setType( string $t ) {
        $this->type = $t;
        return $this;
    }

    public function operation(): string
    {
        return "<input type='{$this->type}' id='{$this->id}' name='{$this->name}'>";
    }

}