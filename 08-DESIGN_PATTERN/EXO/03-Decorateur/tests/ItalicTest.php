<?php

use PHPUnit\Framework\TestCase;

use App\Html\Text;
use App\Html\Italic;

class ItalicTest extends TestCase
{
    Protected Italic $italic;
    Protected Text $text;
    public function setUp(): void
    {
        $this->text = new Text('Bonjour');
        $this->italic = new Italic($this->text);
    }

    /**
     * @test text is Text
     */
    public function testItalicItalic()
    {
        $this->assertInstanceOf('App\Html\Italic', $this->italic);
    }

    public function testStringText()
    {
        $this->assertEquals((string)$this->italic , "<em>{$this->text}</em>");
    }


}