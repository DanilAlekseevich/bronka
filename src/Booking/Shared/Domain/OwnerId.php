<?php

declare(strict_types=1);

namespace Booking\Shared\Domain;

use Ramsey\Uuid\UuidInterface;

final readonly class OwnerId
{
    public function __construct(private UuidInterface $id)
    {
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }
}
