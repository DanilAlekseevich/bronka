<?php

declare(strict_types=1);

namespace Booking\User\Application\DTO;

final readonly class UserRegistration
{
    public function __construct(public string $email, public string $password)
    {
    }
}
