<?php

namespace App\Infrastructure;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $pdo = null;

    /**
     * Establish a connection to the database using PDO.
     *
     * If the connection has already been established, the existing instance will be returned.
     *
     * @return PDO The PDO instance for the database connection.
     *
     * @throws PDOException If the connection fails.
     */
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
