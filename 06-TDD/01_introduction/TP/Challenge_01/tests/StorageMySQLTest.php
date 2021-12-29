<?php

use PHPUnit\Framework\TestCase;

use Cart\StorageMySQL;
use Cart\Product;

class StorageMySQLTest extends TestCase
{
    protected $storageMySQL;
    protected static $pdo;
    protected $productOne;
      
    public function setUp(): void
    {
        $this->productOne = new Product('apple', 100);
        $this->storageMySQL = new StorageMySQL(self::$pdo);
        $this->storageMySQL->reset();
    }

    public static function setUpBeforeClass():void
    {
        self::$pdo = Connect::connect();
    }

    public static function tearDownAfterClass():void
    {
        self::$pdo = Connect::disconnect(self::$pdo);
    }

    /**
     * @test if StorageMySQL is instance of StorageMySQLTestClass
     */
    public function testStorageMySQLTestStorageMySQLTestClass()
    {
        $this->assertInstanceOf(StorageMySQL::class, $this->storageMySQL);
    }

    /**
     * @test somme of storageMySQL
     */
    public function testTotal()
    {
        $this->storageMySQL->setValue('apple', 10.5);
        $this->storageMySQL->setValue('raspberry', 13);
        $this->storageMySQL->setValue('strawberry', 7.8);

        $this->assertEquals(31.3 , $this->storageMySQL->total());
        $this->assertTrue(is_float($this->storageMySQL->total()));
    }

    /**
     * @test add product in storage
     */
    public function testsetValue()
    {
        $this->storageMySQL->setValue('apple', 10.5);
        $this->storageMySQL->setValue('raspberry', 13);
        $this->storageMySQL->setValue('strawberry', 7.8);
        $this->storageMySQL->setValue('apple', 10.5);

        $this->assertEquals(41.8 , $this->storageMySQL->total());
    }

    /**
     * @test the reset
     */
    public function testReset()
    {
        $this->storageMySQL->setValue('apple', 10.5);
        $this->assertTrue(!empty($this->storageMySQL->total()));
        $this->storageMySQL->reset();
        $this->assertEquals(0, $this->storageMySQL->total());
    }

    /**
     * @test the return of methode getStorage
     */
    public function testGetStorage()
    {
        $storage = [
                'apple' => 10.5,
                'raspberry' => 13,
        ];
        $this->storageMySQL->setValue('apple', 10.5);
        $this->storageMySQL->setValue('raspberry', 13);
        $this->assertEquals($storage, $this->storageMySQL->getStorage());

    }

    /**
     * @test delete one product
     */
    public function testRestore()
    {
        $this->storageMySQL->setValue('apple', 10.5);
        $this->storageMySQL->setValue('raspberry', 13);
        $this->storageMySQL->restore('apple');
        $this->assertEquals(13 , $this->storageMySQL->total());
    }
}