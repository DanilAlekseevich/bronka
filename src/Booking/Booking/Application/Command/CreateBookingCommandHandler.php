<?php

declare(strict_types=1);

namespace Booking\Booking\Application\Command;

use Booking\Booking\Domain\Booking;
use Booking\Booking\Domain\BookingRepositoryInterface;
use Booking\Booking\Domain\ValueObject\BookingDate;
use Booking\Shared\Domain\BookingId;
use Booking\Shared\Domain\ClientId;
use Booking\Shared\Domain\HouseId;
use Shared\Application\Command\CommandHandlerInterface;

final readonly class CreateBookingCommandHandler implements
    CommandHandlerInterface
{
    public function __construct(
        private readonly BookingRepositoryInterface $repository
    ) {
    }
    
    public function __invoke(CreateBookingCommand $command): void
    {
        $booking = new Booking();
        $booking->setId(new BookingId($command->bookingId));
        $booking->setClient(new ClientId($command->clientId));
        $booking->setHouse(new HouseId($command->houseId));
        $booking->setDate(new BookingDate($command->start, $command->finish));
        
        $this->repository->create($booking);
    }
}