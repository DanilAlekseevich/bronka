<?php

declare(strict_types=1);

namespace Shared\Application\Query;

interface QueryBusInterface
{
    public function execute(QueryInterface $query): mixed;
}
