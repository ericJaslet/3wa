<?php

namespace UserLogin;

use UserLogin\Storable;
use UserLogin\Repositorable;
use UserLogin\User;

class RepositoryUser implements Repositorable
{
    /**
     * @var Storable
     */
    private Storable $storage;

    /**
     * @var User
     */
    private User $user;

    /**
     * @param Storable $storage
     * @param User $user
     */
    public function __construct(Storable $storage, User $user)
    {
        $this->storage = $storage;
        $this->user = $user;
    }

    /**
     * @param string $name
     * @return User
     */
    public function findOne(string $name = ''):User
    {
        foreach ($this->storage->GetStorage() as $item) {
            if ($item['name'] === $name){
                $this->user->setName($item['name']);
                $this->user->setAge($item['age']);
            }
        }
        return $this->user;
    }
}