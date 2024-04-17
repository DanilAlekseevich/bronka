<?php

declare(strict_types=1);

namespace Booking\Booking\Infrastructure\Symfony;


use Booking\Booking\Application\Command\CreateBookingCommand;
use Booking\Booking\Application\DTO\CreateBooking;
use Booking\House\Application\DTO\CreateHouse;
use Shared\Application\Command\CommandBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

class BookingController extends AbstractController
{
    public function __construct(
        private readonly CommandBusInterface $commandBus
    ) {
    }

    #[Route("/booking/create", name: "booking_create", methods: ["POST"])]
    public function create(#[MapRequestPayload] CreateBooking $dto): JsonResponse
    {
        $bookingId = Uuid::v7()->jsonSerialize();
        $command = new CreateBookingCommand(
            $bookingId,
            $dto->clientId,
            $dto->houseId,
            $dto->start,
            $dto->finish
        );

        $this->commandBus->execute($command);

        return new JsonResponse([
            "booking_id" => $bookingId,
        ]);
    }
}
