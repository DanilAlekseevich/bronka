<?php

declare(strict_types=1);

namespace Booking\House\Infrastructure\Database\Doctrine;

use Booking\House\Domain\House;
use Booking\House\Domain\HouseRepositoryInterface;
use Booking\Shared\Domain\HouseId;

final class DoctrineHouseRepository implements HouseRepositoryInterface
{
    
    public function create(House $house): House
    {
        // TODO: Implement create() method.
    }
    
    public function getById(HouseId $id): House
    {
        // TODO: Implement getById() method.
    }
}