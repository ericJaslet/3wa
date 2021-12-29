<?php

use PHPUnit\Framework\TestCase;

use App\Html\Text;

class TextTest extends TestCase
{
    Protected Text $text;
    public function setUp(): void
    {
        $this->text = new text('Bonjour');
    }

    /**
     * @test text is Text
     */
    public function testTextIstext()
    {
        $this->assertInstanceOf('App\Html\Text', $this->text);
    }

    public function testStringText()
    {
        $this->assertEquals((string)$this->text , 'Bonjour');
    }


}