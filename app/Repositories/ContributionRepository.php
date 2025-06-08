<?php

namespace App\Repositories;

use PDO;

class ContributionRepository extends BaseRepository
{
    protected string $table = 'contributions';

    /**
     * Insert a new contribution record.
     *
     * @param array $payload
     *
     * @return void
     */
    public function create(array $payload): void
    {
        $query = "
            INSERT INTO {$this->table} (
                age, member_type, member_type_id, fiscal_year_id, amount, created_at, updated_at
            ) VALUES (
                :age, :member_type, :member_type_id, :fiscal_year_id, :amount, NOW(), NOW()
            )
        ";

        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':age', $payload['age']);
        $stmt->bindParam(':member_type', $payload['member_type']);
        $stmt->bindParam(':member_type_id', $payload['member_type_id']);
        $stmt->bindParam(':fiscal_year_id', $payload['fiscal_year_id']);
        $stmt->bindParam(':amount', $payload['amount']);

        $stmt->execute();
    }

    /**
     * Update an existing contribution record.
     *
     * @param int $id
     * @param array $payload
     *
     * @return void
     */
    public function update(int $id, array $payload): void
    {
        $query = "
        UPDATE {$this->table}
        SET age = :age,
            member_type = :member_type,
            member_type_id = :member_type_id,
            fiscal_year_id = :fiscal_year_id,
            amount = :amount,
            updated_at = NOW()
        WHERE id = :id
    ";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':age', $payload['age']);
        $stmt->bindParam(':member_type', $payload['member_type']);
        $stmt->bindParam(':member_type_id', $payload['member_type_id']);
        $stmt->bindParam(':fiscal_year_id', $payload['fiscal_year_id']);
        $stmt->bindParam(':amount', $payload['amount']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    /**
     * Retrieve a single contribution by age.
     *
     * @param int $age
     *
     * @return object|false
     */
    public function getContributionByAge(int $age): object|false
    {
        $query = "SELECT * FROM {$this->table} WHERE age = :age LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':age', $age);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function findByTypeAndAgeAndYear(int $memberTypeId, int $age, int $fiscalYearId): ?object
    {
        $stmt = $this->pdo->prepare("
            SELECT * FROM {$this->table}
            WHERE member_type_id = :member_type_id
              AND age = :age
              AND fiscal_year_id = :fiscal_year_id
            LIMIT 1
        ");

        $stmt->bindParam(':member_type_id', $memberTypeId);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':fiscal_year_id', $fiscalYearId);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ) ?: null;
    }
}
