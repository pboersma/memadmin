<?php

namespace App\Repositories;

use App\Helpers\Database;
use App\Interfaces\RepositoryInterface;
use PDO;

abstract class BaseRepository implements RepositoryInterface
{
    protected PDO $pdo;
    protected string $table;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    /**
     * @inheritDoc
     */
    abstract public function create(array $payload): void;

    /**
     * @inheritDoc
     */
    abstract public function update(int $id, array $payload): void;

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @inheritDoc
     */
    public function get(int $id): object
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }
}
