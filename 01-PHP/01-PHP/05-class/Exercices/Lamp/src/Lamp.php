<?php
namespace App;

class Lamp 
{
    public function __construct(
        private bool $state = false,
    ){}

    public function switchDevice() {
        $this->state = !$this->state;
        return $this;
    }
    public function getState() {
        return $this->state;
    }
}