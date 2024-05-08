<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\Bus;

use Shared\Application\Event\EventBusInterface;
use Shared\Domain\Event\IntegrationEventInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class EventBus implements EventBusInterface
{
    use HandleTrait;
    
    public function __construct(
        private readonly MessageBusInterface $commandBus,
    ) {
    }
    
    public function execute(IntegrationEventInterface $event): void
    {
        $this->commandBus->dispatch($event);
    }
}