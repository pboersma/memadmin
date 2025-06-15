<?php

namespace App\Repositories;

use PDO;

class DiscountRepository extends BaseRepository
{
    protected string $table = 'discounts';

    /**
     * @inheritDoc
     */
    public function create(array $payload): void
    {
        $query = "INSERT INTO $this->table (category, min_age, max_age, discount, created_at, updated_at) " .
            "VALUES (:category, :min_age, :max_age, :discount, NOW(), NOW())";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':category', $payload['category']);
        $stmt->bindParam(':min_age', $payload['min_age']);
        $stmt->bindParam(':max_age', $payload['max_age']);
        $stmt->bindParam(':discount', $payload['discount']);

        $stmt->execute();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $payload): void
    {
        $stmt = $this->pdo->prepare("UPDATE $this->table SET category = :category, min_age = :min_age, max_age = :max_age, discount = :discount, updated_at = NOW() WHERE id = :id");
        $stmt->bindParam(':category', $payload['category']);
        $stmt->bindParam(':min_age', $payload['min_age']);
        $stmt->bindParam(':max_age', $payload['max_age']);
        $stmt->bindParam(':discount', $payload['discount']);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }


    /**
     * Get a discount rule that applies to the given age.
     *
     * @param int $age
     *
     * @return object|null
     */
    public function getByAge($age)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE min_age <= :age AND max_age >= :age LIMIT 1");
        $stmt->bindParam(':age', $age);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
