<?php
namespace Calc;
class Connect {

    public static function connect() :\PDO {

        $pdo = null;
        try {
            $pdo = new \PDO( "sqlite:".__DIR__."/_data/calc.sql" );
            echo "connect database".PHP_EOL;
        }
        catch ( \PDOException $e ) {
            echo $e->getMessage();
        }
        return $pdo;
    }

    public static function disconnect( \PDO $pdo ) :void {

        $pdo = null;
        echo "disconnect database".PHP_EOL;
    }


}