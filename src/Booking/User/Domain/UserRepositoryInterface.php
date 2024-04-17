<?php

namespace Booking\User\Domain;

use Booking\User\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function create(User $user): void;
    public function getById(mixed $id): User;
}