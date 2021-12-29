<?php

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$pdo = Connect::connect();

$pdo->query("
    CREATE TABLE IF NOT EXISTS calc ( 
    id          INTEGER         PRIMARY KEY AUTOINCREMENT,
    name        VARCHAR(100),
    price       DECIMAL(7,2),
    total       DECIMAL(7,2)    NOT NULL DEFAULT 0.00
);");

$pdo->exec("DELETE FROM product;");
$pdo->exec("INSERT INTO product (name, price) VALUES  ('apple', 10.5), ('raspberry',13), ('strawberry', 7.8);");

Connect::disconnect($pdo);