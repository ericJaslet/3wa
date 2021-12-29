<?php

namespace UserLogin;
use UserLogin\Storable;

class ArrayUserStorage implements Storable
{
    /**
     * @var array
     */
    private array $store;

    /**
     * @param array $store
     * @return void
     */
    public function addStorage(array $store = []):void
    {
        $this->store = $store;
    }

    /**
     * @return void
     */
    public function getStorage():array
    {
        return $this->store;
    }
}