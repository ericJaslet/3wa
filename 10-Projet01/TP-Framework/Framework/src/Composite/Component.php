<?php

namespace Souris\Composite;

abstract class Component
{
    abstract public function operation(): string;
}