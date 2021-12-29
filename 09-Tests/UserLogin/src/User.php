<?php

namespace UserLogin;
use UserLogin\Entity;

class User implements Entity
{
    /**
     * @var string
     */
    private string $name = '';

    /**
     * @var integer
     */
    private int $age = 0;
    
    /**
     * @return string
     */
    public function __toString():string{
        $string = "Utilisateur {$this->getName()} a {$this->getAge()} an";

        ( $this->getAge() > 1 )? $string.= 's':'';

        return $string;
    }

    /**
     * Get the value of name
     * @return void
     */ 
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of age
     * @return void
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }
}