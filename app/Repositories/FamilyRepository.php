<?php

namespace App\Repositories;

use PDO;

class FamilyRepository extends BaseRepository
{
    protected string $table = 'families';

    /**
     * @inheritDoc
     */
    public function create(array $payload): void
    {
        $query = "INSERT INTO $this->table (name, address, created_at, updated_at) VALUES (:name, :address, NOW(), NOW())";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $payload['name']);
        $stmt->bindParam(':address', $payload['address']);

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


    /**
     * Get all members of a given family with their member type description.
     *
     * @param int $familyId
     *
     * @return array List of family member objects.
     */
    public function getFamilyMembers(int $familyId): array
    {
        $stmt = $this->pdo->prepare("SELECT
            fm.*,
            mt.description AS member_type_description
        FROM family_members fm
        JOIN member_types mt ON fm.member_type_id = mt.id
        WHERE fm.family_id = :family_id");

        $stmt->bindParam(':family_id', $familyId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
