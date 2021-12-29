<?php

namespace App;
use \Iterator;

class Even implements Iterator
{
    private $array = [];

    private int $position = 0;

    public function __construct(
        private int $max = 0,
    ) {
        $this->initArray();
    }

    public function getArray(){return $this->array;}

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->array[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->array[$this->position]);
    }

    private function initArray()
    {
        for($i=0;$i<=$this->max;$i++){
            if ($i % 2 === 0 ) {
                $this->array[] = $i;
            }
        }
    }
}