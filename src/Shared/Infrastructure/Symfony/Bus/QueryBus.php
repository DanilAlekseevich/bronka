<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\Bus;

use Shared\Application\Query\QueryBusInterface;
use Shared\Application\Query\QueryInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class QueryBus implements QueryBusInterface
{
    use HandleTrait;
    
    public function __construct(
        private readonly MessageBusInterface $queryBus,
    ) {
    }
    
    public function execute(QueryInterface $query): mixed
    {
        return $this->handle($query);
    }
}