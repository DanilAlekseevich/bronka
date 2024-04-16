<?php

declare(strict_types=1);

namespace Booking\House\Application\Command\Create;

use Shared\Application\Command\CommandInterface;

class CreateHouseCommand implements CommandInterface
{
    public function __construct(
        public string $houseId,
        public string $ownerId,
        public string $name,
        public int $peopleCapacity,
        public int $bedsCount,
        public int $defaultPrice,
        public int $weekendPrice
    ) {
    }
}
