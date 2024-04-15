<?php

declare(strict_types=1);

namespace Booking\Booking\Domain\ValueObject;

final readonly class BookingDate
{
    public function __construct(
        private \DateTimeInterface $start,
        private \DateTimeInterface $finish
    ) {
    }

    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }

    public function getFinish(): \DateTimeInterface
    {
        return $this->finish;
    }
}
