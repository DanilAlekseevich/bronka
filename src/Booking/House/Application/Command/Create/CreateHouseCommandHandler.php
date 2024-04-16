<?php

declare(strict_types=1);

namespace Booking\House\Application\Command\Create;

use Booking\House\Domain\House;
use Booking\House\Domain\HouseRepositoryInterface;
use Booking\House\Domain\ValueObject\HouseCapacity;
use Booking\House\Domain\ValueObject\HouseName;
use Booking\House\Domain\ValueObject\HousePrice;
use Booking\Shared\Domain\HouseId;
use Booking\Shared\Domain\OwnerId;
use Shared\Application\Command\CommandHandlerInterface;
use Symfony\Component\Uid\Uuid;

final readonly class CreateHouseCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private HouseRepositoryInterface $repository
    ) {
    }

    public function __invoke(CreateHouseCommand $command): void
    {
        $houseId = new HouseId(Uuid::v7()->jsonSerialize());
        $ownerId = new OwnerId($command->ownerId);
        $name = new HouseName($command->name);
        $capacity = new HouseCapacity($command->peopleCapacity, $command->bedsCount);
        $price = new HousePrice($command->defaultPrice, $command->weekendPrice);

        $house = new House(
            $houseId,
            $ownerId,
            $name,
            $capacity,
            $price
        );

       $this->repository->create($house);
    }
}
