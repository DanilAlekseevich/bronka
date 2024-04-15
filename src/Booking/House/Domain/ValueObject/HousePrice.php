<?php

declare(strict_types=1);

namespace Booking\House\Domain\ValueObject;

final readonly class HousePrice
{
    public function __construct(
        private int $workPrice,
        private int $weekendPrice
    ) {
    }

    public function getWorkPrice(): int
    {
        return $this->workPrice;
    }

    public function getWeekendPrice(): int
    {
        return $this->weekendPrice;
    }
}
