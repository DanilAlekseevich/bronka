<?php

declare(strict_types=1);

namespace Booking\Booking\Application\Command;

use Shared\Application\Command\CommandInterface;

final readonly class CreateBookingCommand implements CommandInterface
{
    public function __construct(
        public string $bookingId,
        public string $clientId,
        public string $houseId,
        public \DateTimeInterface $start,
        public \DateTimeInterface $finish,
    )
    {
    }
}