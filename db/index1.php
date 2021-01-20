<?php

$host = '127.0.0.1';
$db   = 'darzoviu_baze';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

// SKAITYMAS ------------------------------------------------------

// sql kalba pasirenkam ka is kur imam ----------------------------
$sql = "SELECT 
customers.id as customer_id, 
customers.name as customer_name,
surname,
products.id as product_id,
`type`,
products.name as vegetable 
FROM customers
LEFT JOIN products
ON customers.id = products.customer_id
ORDER BY customers.name 
;";

$stmt = $pdo->query($sql); // statement'as ------------------------

$masyvas = [];

// kreipiasi i fatch ir gauna po viena eilute is db ---------------
while ($row = $stmt->fetch()) {

    // i masyva idedame kiekviena ta eilute -----------------------
    $masyvas[] = $row;
}

// paziurim ka iraso i masyva -------------------------------------
_d($masyvas);
