<?php

namespace App\Repositories;

class ContributionRepository extends BaseRepository
{
    protected string $table = 'contributions';

    /**
     * @inheritDoc
     */
    public function create(array $payload): void
    {
        $query = "INSERT INTO $this->table (description, created_at, updated_at) " .
                 "VALUES (:description, NOW(), NOW())";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':description', $payload['description']);

        $stmt->execute();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $payload): void
    {
        $stmt = $this->pdo->prepare("UPDATE $this->table SET description = :description, updated_at = NOW() WHERE id = :id");
        $stmt->bindParam(':description', $payload['description']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }
}
