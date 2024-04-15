<?php

declare(strict_types=1);

namespace Booking\House\Domain;

use Booking\House\Domain\ValueObject\HouseCapacity;
use Booking\House\Domain\ValueObject\HouseName;
use Booking\House\Domain\ValueObject\HousePhotos;
use Booking\House\Domain\ValueObject\HousePrice;
use Booking\Shared\Domain\HouseId;
use Booking\Shared\Domain\OwnerId;
use Shared\Domain\AggregateRoot;

readonly class House extends AggregateRoot
{
    public function __construct(
        private HouseId $id,
        private OwnerId $owner,
        private HouseName $name,
        private HouseCapacity $capacity,
        private HousePrice $price,
        private ?HousePhotos $photos = null,
    ) {
    }

    public function getId(): HouseId
    {
        return $this->id;
    }

    public function getOwner(): OwnerId
    {
        return $this->owner;
    }

    public function getName(): HouseName
    {
        return $this->name;
    }

    public function getPhotos(): ?HousePhotos
    {
        return $this->photos;
    }

    public function getCapacity(): HouseCapacity
    {
        return $this->capacity;
    }

    public function getPrice(): HousePrice
    {
        return $this->price;
    }
}
