<?php

namespace Souris;

use \Error;

use ArrayAccess;

class Container implements ArrayAccess
{
    protected $storage = [];

    public function offsetSet($k, $v)
    {
        if (isset($this->storage[$k])) throw new Error('service existe déjà ');

        $this->storage[$k] = $v;
    }

    public function offsetGet($k)
    {
        if (!isset($this->storage[$k])) throw new Error('service n\'existe pas !');

        if (is_callable($this->storage[$k])) return $this->storage[$k]($this);

        return $this->storage[$k];
    }

    public function offsetExists($id)
    {
    }

    public function offsetUnset($id)
    {
    }
}

