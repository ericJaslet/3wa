<?php

namespace Message;

class Message
{
    private array $message = [];

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage(string $message)
    {
        if (is_numeric($message)) {
            //return throw new \InvalidArgumentException();
        }
        $this->message[] = $message;

        return $this;
    }

    public function toUpperMessage()
    {
        return strtoupper( implode( ' ', $this->message));
    }
}