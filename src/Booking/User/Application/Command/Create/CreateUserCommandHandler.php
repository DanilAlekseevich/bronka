<?php

declare(strict_types=1);

namespace Booking\User\Application\Command\Create;

use Booking\User\Domain\Entity\User;
use Booking\User\Domain\UserRepositoryInterface;
use Shared\Application\Command\CommandHandlerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final readonly class CreateUserCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private UserRepositoryInterface $repository,
        private UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $user = new User();
        $user->setId($command->userId);
        $user->setEmail($command->email);

        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $command->password
        );

        $user->setPassword($hashedPassword);

        $this->repository->create($user);
    }
}
