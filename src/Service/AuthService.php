<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;

class AuthService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function register(string $nom, string $email, string $password, int $role_id): bool
    {
        
        if ($this->userRepository->findByEmail($email) !== null) {
            return false; 
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $user = new User($nom, $email, $hashedPassword, 1, $role_id);

        return $this->userRepository->create($user);
    }

    public function login(string $email, string $password): ?User
    {
        
        $user = $this->userRepository->findByEmail($email);

        
        if ($user === null || !password_verify($password, $user->getMotDePasse())) {
            return null;
        }

    
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_role'] = $user->getRoleId();

        return $user;
    }

    public function logout(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
    }
}
