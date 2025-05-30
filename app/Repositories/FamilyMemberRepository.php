<?php

namespace App\Repositories;

class FamilyMemberRepository extends BaseRepository
{
    protected string $table = 'family_members';

    /**
     * @inheritDoc
     */
    public function create(array $payload): void
    {
        $query = "INSERT INTO $this->table
            (name, birthdate, member_type, family_id, member_type_id, created_at, updated_at)
            VALUES (:name, :birthdate, :member_type, :family_id, :member_type_id, NOW(), NOW())";

        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':name', $payload['name']);
        $stmt->bindParam(':birthdate', $payload['birthdate']);
        $stmt->bindParam(':member_type', $payload['member_type']);
        $stmt->bindParam(':member_type_id', $payload['member_type_id']);
        $stmt->bindParam(':family_id', $payload['family_id']);

        $stmt->execute();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $payload): void
    {
        $stmt = $this->pdo->prepare("UPDATE $this->table SET name = :name, updated_at = NOW() WHERE id = :id");
        $stmt->bindParam(':name', $payload['name']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }
}
