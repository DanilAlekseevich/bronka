<?php

declare(strict_types=1);

namespace Booking\House\Domain\ValueObject;

final readonly class HouseName
{
    private readonly string $value;

    public function __construct(string $name)
    {
        $this->value = $name;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
