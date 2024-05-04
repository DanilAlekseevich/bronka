<?php

declare(strict_types=1);

namespace Booking\User\Presentation\Controller;

use Booking\User\Application\Command\Create\CreateUserCommand;
use Booking\User\Application\DTO\UserRegistration;
use Shared\Application\Command\CommandBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

final class UserController extends AbstractController
{
    public function __construct(
        private readonly CommandBusInterface $commandBus
    ) {
    }

    #[Route("/user/registration", name: "user_registration", methods: ["POST"])]
    public function registartion(
        #[MapRequestPayload] UserRegistration $dto
    ): JsonResponse {
        $userId = Uuid::v7()->jsonSerialize();
        $command = new CreateUserCommand($userId, $dto->email, $dto->password);
        $this->commandBus->execute($command);

        return $this->json("user created");
    }
}
