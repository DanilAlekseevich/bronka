<?php

declare(strict_types=1);

namespace Booking\User\Application\Command\Create;

use Shared\Application\Command\CommandInterface;

class CreateUserCommand implements CommandInterface
{
    public function __construct(
        public string $userId,
        public string $email,
        public string $password
    ) {
    }
}
