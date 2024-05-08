<?php

namespace Shared\Application\Event;

use Shared\Domain\Event\IntegrationEventInterface;

interface EventBusInterface
{
    public function execute(IntegrationEventInterface $event): void;
}