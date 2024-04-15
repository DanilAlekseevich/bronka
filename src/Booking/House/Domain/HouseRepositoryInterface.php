<?php

declare(strict_types=1);

namespace Booking\House\Domain;

use Booking\Shared\Domain\HouseId;

interface HouseRepositoryInterface
{
    public function create(House $house): House;
    public function getById(HouseId $id): House;
}
