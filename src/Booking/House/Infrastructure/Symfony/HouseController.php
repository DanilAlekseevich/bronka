<?php

declare(strict_types=1);

namespace Booking\House\Infrastructure\Symfony;

use Booking\House\Application\Command\Create\CreateHouseCommand;
use Booking\Shared\Domain\HouseId;
use Shared\Application\Command\CommandBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class HouseController extends AbstractController
{
    public function __construct(private readonly CommandBusInterface $commandBus)
    {
    }

    #[Route('/house', name: 'house', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        
        
        $command = new CreateHouseCommand(
            $ownerId,
            $name,
            $peopleCapacity,
            $bedCount,
            $defaultPrice,
            $weekendPrice
        );

        /** @var HouseId $houseId */
        $houseId = $this->commandBus->execute($command);

        return new JsonResponse(['house_id' => $houseId->getValue()->toString()]);
    }
}
