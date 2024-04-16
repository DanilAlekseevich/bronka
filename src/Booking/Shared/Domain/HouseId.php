<?php

declare(strict_types=1);

namespace Booking\Shared\Domain;

final readonly class HouseId
{
    public function __construct(private string $id)
    {
    }

    public function getValue(): string
    {
        return $this->id;
    }
}
