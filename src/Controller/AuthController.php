<?php

namespace App\Controller;

use App\Service\AuthService;

class AuthController
{
    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function register(): array
    {
        $result = ['message' => '', 'error' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $role_id = $_POST['role_id'] ?? '';

            if (!empty($nom) && !empty($email) && !empty($password) && !empty($role_id)) {
                if ($this->authService->register($nom, $email, $password, (int)$role_id)) {
                    $result['message'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
                } else {
                    $result['error'] = "L'email est déjà utilisé ou une erreur est survenue.";
                }
            } else {
                $result['error'] = "Tous les champs sont obligatoires.";
            }
        }

        return $result;
    }
}
