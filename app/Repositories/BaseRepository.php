<?php

namespace App\Repositories;

use App\Database;
use PDO;

abstract class BaseRepository
{
    protected PDO $pdo;
    protected string $table;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }


    abstract protected function create(array $payload): void;

    abstract protected function update(int $id, array $payload): void;

    public function getAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function get(int $id): object
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }
}
