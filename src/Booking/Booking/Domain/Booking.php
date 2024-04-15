<?php

declare(strict_types=1);

namespace Booking\Booking\Domain;

use Booking\Booking\Domain\ValueObject\BookingDate;
use Booking\Shared\Domain\ClientId;
use Booking\Shared\Domain\HouseId;
use Shared\Domain\AggregateRoot;

final readonly class Booking extends AggregateRoot
{
    private HouseId $house;
    private ClientId $client;
    private BookingDate $date;

    public function getHouseId(): HouseId
    {
        return $this->house;
    }
}
