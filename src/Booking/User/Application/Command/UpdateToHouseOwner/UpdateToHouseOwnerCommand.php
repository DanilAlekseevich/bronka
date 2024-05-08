<?php

declare(strict_types=1);

namespace Booking\User\Application\Command\UpdateToHouseOwner;

use Shared\Application\Command\CommandInterface;

class UpdateToHouseOwnerCommand implements CommandInterface
{
    public function __construct(
        public string $userId,
    ) {
    }
}
