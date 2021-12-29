<?php

namespace Calc;

use Calc\Connect;

class Storage
{
    private static $pdo;
    public function __construct ()
    {
        self::$pdo = Connect::connect();
    }

    public function getStorage()
    {
        $storage = [];
        $sql = "SELECT nbrOne, nbrTwo, total FROM calc;";
        $stmt = self::$pdo->query($sql);
        while( $row = $stmt->fetch(\PDO::FETCH_ASSOC) ) {
            $storage[] = [ $row['nbrOne'], $row['nbrTwo'], $row['total']];
        }
        
        return $storage;
    }
    
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