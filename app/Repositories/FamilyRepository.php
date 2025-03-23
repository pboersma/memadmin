<?php

namespace App\Repositories;

class FamilyRepository extends BaseRepository
{
    protected string $table = 'families';

    public function create(array $payload): void
    {
        $query = "INSERT INTO $this->table (name, created_at, updated_at) VALUES (:name, NOW(), NOW())";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $payload['name']);

        $stmt->execute();
    }

    public function update(int $id, array $payload): void
    {
        $stmt = $this->pdo->prepare("UPDATE $this->table SET name = :name, updated_at = NOW() WHERE id = :id");
        $stmt->bindParam(':name', $payload['name']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }
}
