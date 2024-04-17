<?php

declare(strict_types=1);

namespace Booking\Booking\Domain;

use Booking\Booking\Domain\ValueObject\BookingDate;
use Booking\Shared\Domain\BookingId;
use Booking\Shared\Domain\ClientId;
use Booking\Shared\Domain\HouseId;
use Shared\Domain\AggregateRoot;

final class Booking extends AggregateRoot
{
    private BookingId $id;
    private ClientId $client;
    private HouseId $house;
    private BookingDate $date;
    
    public function getId(): BookingId
    {
        return $this->id;
    }
    
    public function setId(BookingId $id): void
    {
        $this->id = $id;
    }
    
    public function getClient(): ClientId
    {
        return $this->client;
    }
    
    public function setClient(ClientId $client): void
    {
        $this->client = $client;
    }
    
    public function getHouse(): HouseId
    {
        return $this->house;
    }
    
    public function setHouse(HouseId $house): void
    {
        $this->house = $house;
    }
    
    public function getDate(): BookingDate
    {
        return $this->date;
    }
    
    public function setDate(BookingDate $date): void
    {
        $this->date = $date;
    }
}
