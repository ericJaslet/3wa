<?php
use PHPUnit\Framework\TestCase;
use App\Message;

class MessageTest extends TestCase{

    protected Message $message;

    public function setUp():void{
        // $this->message = new Message('en');
        $this->message = new Message($_ENV['LANGUAGE'] ?? 'en');
    }

    protected function tearDown():void
    {
        var_dump("Fermeture du test"); 
    }

    /**
     * @test langue en
     */
    public function testLangEn(){

        $this->message->setLang('en');
        $this->assertSame("Hello World!",$this->message->get());
    }

    public function testLangFr()
    {
        $this->message->setLang('fr');
        $this->assertSame("Bonjour tout le monde!.",$this->message->get());
    }

    public function testIfExistEnv()
    {
        $this->assertTrue( isset($_ENV['LANGUAGE']));
    }

    /**
     * @test testVariableEnv variables env
     */
    public function testVariableEnv()
    {
        $this->assertContains($_ENV['LANGUAGE'], ['fr', 'en']);
    }

    /**
     * @test testTranslate function env
     */
    public function testTranslateEnv()
    {
        $this->message->setLang('en');
        $this->assertSame("Hello World!",$this->message->get());

        $this->message->setLang('fr');
        $this->assertSame("Bonjour tout le monde!.",$this->message->get());
    }
}