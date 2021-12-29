<?php

namespace Cart;

use Cart\Product;

class StorageMySQL implements Storable{

    public function __construct(
        private \PDO $pdo
        )
    {}

    public function setValue(string $name, float $price):void
    {

        $row = $this->findOneBuyName($name);

        if (count($row) === 1){

            $productArray = $row[0];
            $productArray['price'] += $price;
            $this->addPriceOneProduct($name, $productArray['price']);
            return;
        }
        
        $this->addOneProduct( $name, $price );
    }

    public function restore( string $name ):void
    {
        $row = $this->findOneBuyName($name);
        if (count($row) === 1) {
            $sql = "DELETE FROM product WHERE name = :name";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':name' => $name]);
        }
    }

    public function reset():void{
        $this->pdo->exec("DELETE FROM product;");
    }

    
    public function total(): float
    {
        $sql = "SELECT SUM(price) FROM product";
        $stmt = $this->pdo->query($sql);
        $totalPrice =  $stmt->fetchColumn();
        if (empty($totalPrice)) return 0;
        return $totalPrice;
    }

    public function getStorage():array{

        $storage = [];
        $sql = "SELECT name, price FROM product;";
        $stmt = $this->pdo->query($sql);
        while( $row = $stmt->fetch(\PDO::FETCH_ASSOC) ) {
            $storage[ $row['name'] ] = $row['price'];
        }
        return $storage;
    }

    /*Add function */
    public function findOneBuyName(string $name)
    {
        $sql = "SELECT * FROM product WHERE name = :name LIMIT 0, 1;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':name' => $name]);
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
    }

    public function addPriceOneProduct(string $name, float $price)
    {
        $sql = "UPDATE product SET price = :price WHERE name = :name;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':name' => $name, ':price' => $price]);

    }

    public function addOneProduct(string $name, float $price)
    {
        $sql = "INSERT INTO product (name, price) VALUES  (:name, :price);";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':name' => $name, ':price' => $price]);

    }
}