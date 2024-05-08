<?php

declare(strict_types=1);

namespace Booking\User\Presentation;

use Booking\User\Application\Command\Create\CreateUserCommand;
use Booking\User\Application\Command\UpdateToHouseOwner\UpdateToHouseOwnerCommand;
use Booking\User\Application\DTO\UserRegistration;
use Booking\User\Application\DTO\UserUpdateToHouseOwner;
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

    #[Route("/api/v1/user/registration", name: "user_registration", methods: ["POST"])]
    public function registration(
        #[MapRequestPayload] UserRegistration $dto
    ): JsonResponse {
        $userId = Uuid::v7()->jsonSerialize();
        $command = new CreateUserCommand($userId, $dto->email, $dto->password);
        $this->commandBus->execute($command);

        return $this->json("user created");
    }
    
    #[Route("/api/v1/user/set/house_owner", name: "update_to_house_owner", methods: ["POST"])]
    public function setUserToHouseOwner(#[MapRequestPayload] UserUpdateToHouseOwner $dto): JsonResponse
    {
        $command = new UpdateToHouseOwnerCommand($dto->userId);
        $this->commandBus->execute($command);
        
        return $this->json("user updated to house_owner");
    }
}
