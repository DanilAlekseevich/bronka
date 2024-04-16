<?php

declare(strict_types=1);

namespace Booking\Shared\Domain;

final readonly class OwnerId
{
    public function __construct(private string $id)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }
}
