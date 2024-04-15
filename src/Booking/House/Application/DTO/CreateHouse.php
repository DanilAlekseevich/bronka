<?php

declare(strict_types=1);

namespace Booking\House\Application\DTO;

final readonly class CreateHouse
{
    public function __construct(
        public string $ownerId,
        public string $name,
        public int $peopleCapacity,
        public int $bedsCount,
        public int $defaultPrice,
        public int $weekendPrice
    )
    {
    }
}

