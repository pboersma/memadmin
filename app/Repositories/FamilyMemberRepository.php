<?php

namespace App\Repositories;

class FamilyMemberRepository extends BaseRepository
{
    protected string $table = 'family_members';

    public function create(array $payload): void
    {
        $query = "INSERT INTO $this->table (name, family_id, created_at, updated_at) " .
                 "VALUES (:name, :family_id, NOW(), NOW())";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $payload['name']);
        $stmt->bindParam(':family_id', $payload['family_id']);

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
