<?php

namespace Main;

use PDO;
use Cucumber\Agurkas;
use Peper\Paprika;

class DbStorage implements Store
{

    private $pdo;

    public function __construct($o = null)
    {
        $host = '127.0.0.1';
        $db   = 'sodas';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    public function getAll()
    {
        // SKAITYMAS viskas is darzoviu
        $sql = "SELECT * FROM darzove
        ;";
        $stmt = $this->pdo->query($sql); // SAUGI nes SELECT * FROM

        $masyvas = [];
        while ($row = $stmt->fetch()) {
            // AGURKAS ------------------------------------------
            if ('agurkas' == $row['type']) {
                $obj = new Agurkas(null);
            }
            if ('paprika' == $row['type']) {
                $obj = new Paprika(null);
            }
            $obj->id = $row['id'];
            $obj->count = $row['count'];
            $obj->type = $row['type'];
            // i masyva ideda objekta
            $masyvas[] = $obj;
        }
        return $masyvas;
    }

    public function getNewId()
    {
        return null;
    }

    public function addNewAgurkas(Agurkas $agurkasObj)
    {
        $sql = "INSERT INTO darzove (`count`, `type`)
        VALUES ('.$agurkasObj->count.', 'agurkas');";
        // $stmt = $this->pdo->prepare($sql);
        // $stmt->execute([$agurkasObj]);
        $this->pdo->query($sql); // NESAUGU!!!
    }

    public function addNewPaprika(Paprika $paprikaObj)
    {
        $sql = "INSERT INTO darzove (`count`, `type`)
        VALUES ('.$paprikaObj->count.', 'paprika');";
        // $stmt = $this->pdo->prepare($sql);
        // $stmt->execute([$paprikaObj]);
        $this->pdo->query($sql); // NESAUGU!!!
    }

    public function remove($id)
    {
        $sql = "DELETE FROM darzove 
        WHERE id = ? ;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        // $this->pdo->query($sql); // NESAUGU!!!
    }
}
