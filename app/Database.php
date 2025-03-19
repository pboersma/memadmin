<?php

namespace App;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $pdo = null;

    public static function connect(): PDO
    {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO(
                    "mysql:host=" . env('DB_HOST', '127.0.0.1') . ";dbname=" . env('DB_DATABASE', 'memadmin'),
                    env('DB_USERNAME', 'root'),
                    env('DB_PASSWORD', 'root'),
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
