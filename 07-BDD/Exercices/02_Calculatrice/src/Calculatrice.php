<?php

namespace Calc;

use Calc\Connect;
use Calc\MemoryException;

class Calculatrice
{
    private static $pdo;

    private array $memory = [];
    private $nbr1 = null;
    private $nbr2 = null;

    public function __construct()
    {
        self::$pdo = Connect::connect();
        $this->initTableMemory();
    }

    public function add(int $nbr)
    {
        if (is_null($this->nbr1) ) {
            $this->nbr1 = $nbr;
            return $nbr + 0;
        }
        $this->nbr2 = $nbr;
        $total = $this->nbr1 + $this->nbr2;

        if ($total < 200 ){
            throw new \Exception("Le résultat doit être supérieur à 200.");
        }

        $this->memory[] = [$this->nbr1, $this->nbr2, $total];

        // enregistre en memoire
        $this->insertInMemory($this->nbr1, $this->nbr2, $total);

        $this->nbr1 = null;
        $this->nbr2 = null;

        return $total;
    }

    public function getMemory()
    {
        $storage = [];
        $sql = "SELECT nbrOne, nbrTwo, total FROM calc;";
        $stmt = self::$pdo->query($sql);
        while( $row = $stmt->fetch(\PDO::FETCH_ASSOC) ) {
            $storage[] = [ $row['nbrOne'], $row['nbrTwo'], $row['total']];
        }
        
        return $storage;
    }

    public function reset()
    {
        $this->memory = [];
        self::$pdo->exec("DELETE FROM calc;");
    }

    // create memory repository
    private function initTableMemory()
    {
        self::$pdo->query("
            CREATE TABLE IF NOT EXISTS calc ( 
            id          INTEGER         PRIMARY KEY AUTOINCREMENT,
            nbrOne      INTEGER,
            nbrTwo      INTEGER,
            total       INTEGER    NOT NULL DEFAULT 0.00
        );");
    }

    private function insertInMemory($nbr1, $nbr2, $total)
    {
        $sql = "INSERT INTO calc (nbrOne, nbrTwo, total) VALUES (:nbr1, :nbr2, :total);";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([':nbr1' => $nbr1, ':nbr2' => $nbr2, ':total' => $total]);
    }

}