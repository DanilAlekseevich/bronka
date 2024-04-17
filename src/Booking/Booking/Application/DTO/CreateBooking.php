<?php

declare(strict_types=1);

namespace Booking\Booking\Application\DTO;

final readonly class CreateBooking
{
    public function __construct(
        public string $clientId,
        public string $houseId,
        public \DateTimeInterface $start,
        public \DateTimeInterface $finish,
    ) {
    }
}