<?php


namespace App\Model;

class Person
{
    private Array $relation;

    public function __construct(
        private string $name,
        private int $id = 0)
    {}

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

    /**
     * Get the value of relation
     */ 
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * Set the value of relation
     *
     * @return  self
     */ 
    public function addRelation($relation)
    {
        $this->relation[] = $relation;

        return $this;
    }
}