<?php

namespace App\Repositories;

use PDO;

class RoleRepository extends BaseRepository
{
    protected string $table = 'roles';

    public function create(array $payload): void
    {
        $query = "INSERT INTO {$this->table} (name, description, created_at, updated_at) VALUES (:name, :description, NOW(), NOW())";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $payload['name']);
        $stmt->bindParam(':description', $payload['description']);
        $stmt->execute();
    }

    public function update(int $id, array $payload): void
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET name = :name, description = :description, updated_at = NOW() WHERE id = :id");
        $stmt->bindParam(':name', $payload['name']);
        $stmt->bindParam(':description', $payload['description']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getRolesByUserId(int $userId): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT r.* FROM roles r JOIN users_roles ur ON r.id = ur.role_id WHERE ur.user_id = :user_id'
        );
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

