<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints\NotBlank;

class User {
    private ?int $id = null;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;

    public function __construct(
        ?int $id,
        string $firstname,
        string $lastname,
        string $email,
        string $password
    ) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
    }

    // Getters and setters

    public function getId(): ?int {
        return $this->id;
    }
    public function getFirstName(): ?string {
        return $this->firstname;
    }
    public function getLastName(): ?string {
        return $this->lastname;
    }
    public function getEmail(): ?string {
        return $this->email;
    }
    public function getPassword(): ?string {
        return $this->password;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }
    public function setFirstName(string $firstname): void {
        $this->firstname = $firstname;
    }
    public function setLastName(string $lastname): void {
        $this->last_name = $lastname;
    }
    public function setEmail(string $email): void {
        $this->email = $email;
    }
    public function setPassword(string $password): void {
        $this->password = $password;
    }




}