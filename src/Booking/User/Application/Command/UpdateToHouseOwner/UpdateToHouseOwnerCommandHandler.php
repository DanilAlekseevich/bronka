<?php

declare(strict_types=1);

namespace Booking\User\Application\Command\UpdateToHouseOwner;

use Booking\User\Domain\Entity\User;
use Booking\User\Domain\UserRepositoryInterface;
use Shared\Application\Command\CommandHandlerInterface;

final readonly class UpdateToHouseOwnerCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private UserRepositoryInterface $repository,
    ) {
    }

    public function __invoke(UpdateToHouseOwnerCommand $command): void
    {
        $user = $this->repository->getById($command->userId);
        if (!$user instanceof User) {
            throw new \Exception('User not found');
        }
        
        $user->setHouseOwner();

        $this->repository->save($user);
    }
}
