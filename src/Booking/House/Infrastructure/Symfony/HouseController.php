<?php

declare(strict_types=1);

namespace Booking\House\Infrastructure\Symfony;

use Booking\House\Application\Command\Create\CreateHouseCommand;;

use Booking\House\Application\DTO\CreateHouse;
use Shared\Application\Command\CommandBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

class HouseController extends AbstractController
{
    public function __construct(
        private readonly CommandBusInterface $commandBus
    ) {
    }

    #[Route("/house/create", name: "house_create", methods: ["POST"])]
    public function create(#[MapRequestPayload] CreateHouse $dto): JsonResponse
    {
        $houseId = Uuid::v7()->jsonSerialize();
        $command = new CreateHouseCommand(
            $houseId,
            $dto->ownerId,
            $dto->name,
            $dto->peopleCapacity,
            $dto->bedsCount,
            $dto->defaultPrice,
            $dto->weekendPrice
        );

        $this->commandBus->execute($command);

        return new JsonResponse([
            "house_id" => $houseId,
        ]);
    }
}
