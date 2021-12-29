<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use Message\Message;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private Message $message;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->message = new Message();
    }

    /**
     * @Given j'ai un nouveau message :message
     */
    public function jaiUnNouveauMessage($message)
    {
        //throw new PendingException();
        // Mettre ici un try catch pour capturer l'execption
        $this->message->setMessage($message);
    }

    /**
     * @Then je dois avoir :arg1
     */
    public function jeDoisAvoir()
    {
        // throw new PendingException();
        return $this->message->toUpperMessage();
    }

    /**
     * @Then je dois avoir une exception :arg1
     */
    public function jeDoisAvoirUneException()
    {
        return $this->message->setMessage(17);
        // return new InvalidArgumentException();
        // throw new PendingException();
    }

    /**
     * @Given un deuxième message :message
     */
    public function unDeuxiemeMessage($message)
    {
        // throw new PendingException();
        $this->message->setMessage($message);
    }
}
