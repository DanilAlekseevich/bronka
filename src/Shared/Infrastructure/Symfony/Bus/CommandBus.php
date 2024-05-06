<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\Bus;

use Shared\Application\Command\CommandBusInterface;
use Shared\Application\Command\CommandInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class CommandBus implements CommandBusInterface
{
    use HandleTrait;
    
    public function __construct(
        private readonly MessageBusInterface $commandBus,
    ) {
    }
    
    public function execute(CommandInterface $command): mixed
    {
        return $this->commandBus->dispatch($command);
    }
}