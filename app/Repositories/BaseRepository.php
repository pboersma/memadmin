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
     * Get a single record by a given column and value.
     *
     * @param mixed $value   The value to search for.
     * @param string $column The column to search in (default: 'id').
     *
     * @return object|null   The fetched record or null if not found.
     */
    public function get(mixed $value, string $column = 'id'): ?object
    {
        $query = "SELECT * FROM {$this->table} WHERE {$column} = :value LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':value', $value);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ) ?: null;
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
