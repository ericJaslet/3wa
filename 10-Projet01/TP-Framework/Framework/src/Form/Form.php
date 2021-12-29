<?php

namespace Souris\Form;

use Souris\Composite\Composite;

class Form extends Composite
{

    public function __construct(
        private string $action='',
        private string $method="POST",
    )
    {
        parent::__construct();
    }

    public function formView(): string
    {
        return "<form action=\"{$this->action}\" method=\"{$this->method}\">" . parent::operation() . "</form>";
    }

}