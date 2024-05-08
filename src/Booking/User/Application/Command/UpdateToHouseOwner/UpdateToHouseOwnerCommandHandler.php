<?php

declare(strict_types=1);

namespace Booking\User\Application\Command\UpdateToHouseOwner;

use Booking\User\Application\Command\Create\CreateUserCommand;
use Booking\User\Domain\Entity\User;
use Booking\User\Domain\Event\UserBecomeHouseOwner;
use Booking\User\Domain\UserRepositoryInterface;
use Shared\Application\Command\CommandHandlerInterface;
use Shared\Application\Event\EventBusInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\SerializerInterface;

final readonly class UpdateToHouseOwnerCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private UserRepositoryInterface $repository,
        private EventBusInterface $eventBus,
        private SerializerInterface $serializer,
    ) {
    }

    public function __invoke(UpdateToHouseOwnerCommand $command): void
    {
        $user = $this->repository->getById($command->userId);
        if (!$user instanceof User) {
            throw new \Exception('User not found');
        }
        
        $user->addRoles(['ROLE_HOUSE_OWNER']);

        $this->repository->save($user);
        
        $payload = $this->serializer->serialize(['user' => $user->getId()], 'json');
        $event = new UserBecomeHouseOwner($payload);
        $this->eventBus->execute($event);
    }
}
