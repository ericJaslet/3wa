<?php

use PHPUnit\Framework\TestCase;

use App\Form\Wrapper;
use App\Form\Input;

class WrapperTest extends TestCase
{
    protected Wrapper $wrapper;

    public function setUp(): void
    {
        $this->wrapper = new Wrapper();
    }

    public function testWrapperIsWrapper()
    {
        $this->assertInstanceOf('App\Form\Wrapper', $this->wrapper);
    }
}