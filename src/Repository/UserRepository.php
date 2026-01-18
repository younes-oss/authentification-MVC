<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\User;
use PDO;

class UserRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function create(User $user): bool
    {
        $sql = "INSERT INTO users (nom, email, mot_de_passe, status, role_id) 
                VALUES (:nom, :email, :mot_de_passe, :status, :role_id)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            'nom' => $user->getNom(),
            'email' => $user->getEmail(),
            'mot_de_passe' => $user->getMotDePasse(),
            'status' => $user->getStatus(),
            'role_id' => $user->getRoleId()
        ]);
    }

    public function findByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);
        
        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }
        
        return new User(
            $data['nom'],
            $data['email'],
            $data['mot_de_passe'],
            (int)$data['status'],
            (int)$data['role_id'],
            (int)$data['id'],
            $data['created_at']
        );
    }
}
