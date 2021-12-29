<?php

namespace Souris\Composite;

/**
 * Class Component
 * @package Souris\Composite
 */
abstract class Component
{
    abstract public function operation(): string;
}