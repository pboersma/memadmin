<?php

namespace App\Repositories;

use App\Database;
use PDO;

class BaseRepository
{
    protected PDO $pdo;
    protected string $table;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
