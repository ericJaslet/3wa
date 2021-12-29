<?php

namespace Souris\Container;

use \Error;

use ArrayAccess;

/**
 * Class Container
 * @package Souris\Container
 */
class Container implements ArrayAccess
{
    /**
     * @var array
     */
    protected $storage = [];

    /**
     * @param mixed $k
     * @param mixed $v
     */
    public function offsetSet($k, $v)
    {
        if (isset($this->storage[$k])) throw new Error('service existe déjà ');

        $this->storage[$k] = $v;
    }

    /**
     * @param mixed $k
     * @return mixed
     */
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
