<?php

namespace App\Repositories;

use App\Helpers\Database;
use PDO;

class UserRepository extends BaseRepository
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function create(array $payload): void
    {
        [$name, $email, $hashedPassword] = $payload;

        $stmt = $this->pdo->prepare("
        INSERT INTO users (name, email, password, created_at, updated_at)
        VALUES (?, ?, ?, NOW(), NOW())
    ");

        $stmt->execute([$name, $email, $hashedPassword]);
    }

    public function update(int $id, array $payload): void
    {
        return;
    }

    public function findByEmail(string $email): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public function storeSession(string $id, int $userId, string $ip, string $userAgent, string $payload, int $lastActivity): void
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO sessions (id, user_id, ip_address, user_agent, payload, last_activity)
            VALUES (?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
                user_id = VALUES(user_id),
                ip_address = VALUES(ip_address),
                user_agent = VALUES(user_agent),
                payload = VALUES(payload),
                last_activity = VALUES(last_activity)
        ");

        $stmt->execute([
            $id,
            $userId,
            $ip,
            $userAgent,
            $payload,
            $lastActivity
        ]);
    }
}
