<?php

declare(strict_types=1);

namespace Booking\User\Domain\Event;

use Shared\Domain\Event\IntegrationEventInterface;

final readonly class UserBecomeHouseOwner implements IntegrationEventInterface
{
    public function __construct(public string $userId)
    {
    }
}