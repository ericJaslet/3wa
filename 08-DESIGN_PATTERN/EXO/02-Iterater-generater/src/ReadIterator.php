<?php

namespace App;
use \SplFileObject;

class ReadIterator
{
    public function __construct (
        private SplFileObject $storage
    ){}
    
    public function iter()
    {}
}