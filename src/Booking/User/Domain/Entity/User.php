<?php

declare(strict_types=1);

namespace Booking\User\Domain\Entity;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    private string $id;
    private string $email;
    private string $password;

    private array $roles = [];
    
    public function getId(): string
    {
        return $this->id;
    }
    
    public function setId(string $id): void
    {
        $this->id = $id;
    }
    
    public function getEmail(): string
    {
        return $this->email;
    }
    
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    
    public function getPassword(): string
    {
        return $this->password;
    }
    
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function addRoles(array $roles): void
    {
        $this->roles[] = $roles;
    }
    
    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
    }
    
    public function getUserIdentifier(): string
    {
        return $this->email;
    }
}