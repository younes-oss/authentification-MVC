<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Config\Database;

try {
    $pdo = Database::getConnection();
    echo "Connexion reussie à la base de données ";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
