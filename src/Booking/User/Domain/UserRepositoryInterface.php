<?php

declare(strict_types=1);

namespace Booking\User\Domain;

use Booking\User\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function create(User $user): void;
    public function getById(mixed $id): ?User;
    public function save(User $user): void;
}
