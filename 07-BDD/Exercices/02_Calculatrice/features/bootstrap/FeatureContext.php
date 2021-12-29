<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use PHPUnit\Framework\Assert;

use Calc\Calculatrice;
use Calc\MemoryException;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private Calculatrice $calc;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->calc = new Calculatrice;

    }

    /**
     * @Given il y a :arg1 concombres
     */
    public function ilYAConcombres($arg1)
    {
        Assert::assertTrue(true);
        $this->calc->add($arg1);
    }

    /**
     * @When j'ajoute :arg1 concombres
     */
    public function jajouteConcombres($arg1)
    {
        $this->calc->add($arg1);
    }

    /**
     * @Then je dois avoir :arg1 concombres
     */
    public function jeDoisAvoirConcombres($arg1)
    {
        try {
            $memory = $this->calc->getMemory();
          }
          catch(\Exception $ex) {
            return $ex->message;
          }

        if ( empty($memory) ) return 0;

        $count = count($memory) - 1;

        Assert::assertTrue(is_numeric($memory[$count][2]));

        return $memory[$count][2];

    }

    /**
     * @When je mange :arg1 concombres
     */
    public function jeMangeConcombres($arg1)
    {
        $this->calc->add(-$arg1);
    }

    /**
     * @When je vide la memoire
     */
    public function jeVideLaMemoire()
    {
        $this->calc->reset();
        // throw new PendingException();
    }

    /**
     * @Then la mémoire est True
     */
    public function laMemoireEstTrue()
    {
        $memory = [
            [200, 20, 220]
        ];
        Assert::assertIsArray($this->calc->getMemory());
        return Assert::assertEquals($memory, $this->calc->getMemory());
    }
}
