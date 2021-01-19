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

// RASYMAS --------------------------------------------------------

$sql = "INSERT INTO `products` (`type`, `name`, `price`)
VALUES (1, 'Agurkas', 0.78);";

$pdo->query($sql);

// REDAGAVIMAS ----------------------------------------------------

$sql = "UPDATE products
SET price=0.36
WHERE `name`='Agurkas';";

$pdo->query($sql);

// TRYNIMAS -------------------------------------------------------

$sql = "DELETE FROM products
WHERE `name` = 'Agurkas';";

$pdo->query($sql);


// SKAITYMAS ------------------------------------------------------

// sql kalba pasirenkam ka is kur imam ----------------------------
$sql = "SELECT `id`, `type`, `name`, `price` FROM `products`;";

$stmt = $pdo->query($sql); // statement'as ------------------------

$masyvas = [];

// kreipiasi i fatch ir gauna po viena eilute is db ---------------
while ($row = $stmt->fetch()) {

    // i masyva idedame kiekviena ta eilute -----------------------
    $masyvas[] = $row;
}

// paziurim ka iraso i masyva -------------------------------------
_d($masyvas);
