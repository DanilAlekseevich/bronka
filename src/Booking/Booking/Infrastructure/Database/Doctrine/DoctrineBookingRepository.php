<?php

declare(strict_types=1);

namespace Booking\Booking\Infrastructure\Database\Doctrine;

use Booking\Booking\Domain\Booking;
use Booking\Booking\Domain\BookingRepositoryInterface;

final class DoctrineBookingRepository implements BookingRepositoryInterface
{
    
    public function create(Booking $booking): void
    {
        // TODO: Implement create() method.
    }
}