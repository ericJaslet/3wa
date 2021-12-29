<?php

namespace App;
use \App\Lamp as Lamp;

class Button
{
    public function __construct(
        private Lamp $lamp
    ){}
    
    public function switchDevice(){
        $this->lamp->switchDevice();
        $this->state();
    }
    private function state() {
        echo ($this->lamp->getState()) ? 'turn on' : 'turn off';
        echo PHP_EOL;
    }
}
