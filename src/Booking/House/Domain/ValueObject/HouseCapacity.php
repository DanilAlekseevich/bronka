<?php

declare(strict_types=1);

namespace Booking\House\Domain\ValueObject;

final readonly class HouseCapacity
{
    public function __construct(
        private int $people,
        private int $beds
    ) {
    }

    public function getPeople(): int
    {
        return $this->people;
    }

    public function getBeds(): int
    {
        return $this->beds;
    }
}
