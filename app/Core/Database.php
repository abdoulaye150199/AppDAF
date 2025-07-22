<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?self $instance = null;
    private PDO $pdo;

    private function __construct()
    {
        $dsn = sprintf(
            "pgsql:host=%s;port=%s;dbname=%s",
            DB_HOST,
            DB_PORT,
            DB_NAME
        );
        
        try {
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            throw new \RuntimeException('Erreur de connexion : ' . $e->getMessage());
        }
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}
