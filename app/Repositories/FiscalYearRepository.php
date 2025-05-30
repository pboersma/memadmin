<?php

namespace App\Repositories;

use PDO;

class FiscalYearRepository extends BaseRepository
{
    protected string $table = 'fiscal_years';

    /**
     * @inheritDoc
     */
    public function create(array $payload): void
    {
        $query = "INSERT INTO $this->table (year, created_at, updated_at) " .
            "VALUES (:year, NOW(), NOW())";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':year', $payload['year']);

        $stmt->execute();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $payload): void
    {
        $stmt = $this->pdo->prepare("UPDATE $this->table SET description = :year, updated_at = NOW() WHERE id = :id");
        $stmt->bindParam(':year', $payload['year']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    public function existsByYear(int $year): bool
    {
        $query = "SELECT COUNT(*) FROM {$this->table} WHERE year = :year LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->execute();

        return (bool) $stmt->fetchColumn();
    }
}
