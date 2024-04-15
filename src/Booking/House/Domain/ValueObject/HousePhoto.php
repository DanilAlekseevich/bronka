<?php

declare(strict_types=1);

namespace Booking\House\Domain\ValueObject;

final readonly class HousePhoto
{
    public function __construct(private string $path)
    {
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
