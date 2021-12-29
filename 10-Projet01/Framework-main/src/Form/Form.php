<?php

namespace Souris\Form;

use Souris\Composite\Composite;

/**
 * Class Form
 * @package Souris\Form
 */
class Form extends Composite
{
    /**
     * Form constructor.
     * @param string $action
     * @param string $method
     */
    public function __construct(
        private string $action = '',
        private string $method = "POST",
    ) {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function formView(): string
    {
        return "<form action=\"{$this->action}\" method=\"{$this->method}\">" . parent::operation() . "</form>";
    }
}
