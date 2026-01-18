<?php

namespace App\Entity;

class User
{
    private ?int $id = null;
    private string $nom;
    private string $email;
    private string $mot_de_passe;
    private string $created_at;
    private int $status;
    private ?int $role_id;

    public function __construct(
        string $nom = "",
        string $email = "",
        string $mot_de_passe = "",
        int $status = 1,
        ?int $role_id = null,
        ?int $id = null,
        string $created_at = ""
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->status = $status;
        $this->role_id = $role_id;
        $this->created_at = $created_at;
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function getEmail(): string { return $this->email; }
    public function getMotDePasse(): string { return $this->mot_de_passe; }
    public function getCreatedAt(): string { return $this->created_at; }
    public function getStatus(): int { return $this->status; }
    public function getRoleId(): ?int { return $this->role_id; }

    // Setters
    public function setId(?int $id): void { $this->id = $id; }
    public function setNom(string $nom): void { $this->nom = $nom; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function setMotDePasse(string $mot_de_passe): void { $this->mot_de_passe = $mot_de_passe; }
    public function setCreatedAt(string $created_at): void { $this->created_at = $created_at; }
    public function setStatus(int $status): void { $this->status = $status; }
    public function setRoleId(?int $role_id): void { $this->role_id = $role_id; }
}
