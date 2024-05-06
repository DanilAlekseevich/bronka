<?php

declare(strict_types=1);

namespace Booking\User\Presentation;

use Booking\User\Application\Command\Create\CreateUserCommand;
use Booking\User\Application\DTO\UserRegistration;
use Booking\User\Domain\Entity\User;
use Shared\Application\Command\CommandBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\HttpFoundation\Response;

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

    #[Route("/user/login", name:"user_login", methods: ["POST"])]
    public function login(#[CurrentUser] ?User $user): JsonResponse
    {
        if (null === $user) {
            return $this->json(
                [
                "message"=> "missing credentials",
                ], 
                Response::HTTP_UNAUTHORIZED
            );
        }

        return $this->json($user->getUserIdentifier());
    }
}
