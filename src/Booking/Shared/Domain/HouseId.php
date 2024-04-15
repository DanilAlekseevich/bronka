<?php

declare(strict_types=1);

namespace Booking\Shared\Domain;

use Ramsey\Uuid\UuidInterface;

final readonly class HouseId
{
    public function __construct(private UuidInterface $id)
    {
    }

    public function getValue(): UuidInterface
    {
        return $this->id;
    }
}
