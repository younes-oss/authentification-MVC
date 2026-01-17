<?php

namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private const DB_NAME = 'auth_mvc';
    private const DB_USER = 'root';
    private const DB_PASS = '';
    private const DB_CHARSET = 'utf8mb4';

    private static ?PDO $instance = null;

    private function __construct()
    {
    }

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $dsn = 'mysql:host=localhost;dbname=' . self::DB_NAME . ';charset=' . self::DB_CHARSET;

            try {
                self::$instance = new PDO($dsn, self::DB_USER, self::DB_PASS, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                die('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
