<?php

declare(strict_types=1);

namespace Booking\Booking\Application\Command;

use Booking\Booking\Domain\BookingRepositoryInterface;
use Shared\Application\Command\CommandHandlerInterface;

final readonly class CreateBookingCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private readonly BookingRepositoryInterface $repository
    ) {
    }
    
    public function __invoke(CreateBookingCommand $command): void
    {
    
    }
}