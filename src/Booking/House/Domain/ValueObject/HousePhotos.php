<?php

declare(strict_types=1);

namespace Booking\House\Domain\ValueObject;

final class HousePhotos
{
    /**
     * @var list<HousePhoto> $photos
     */
    public function __construct(private array $photos)
    {
    }

    /**
     * @return list<string>
     */
    public function getPaths(): array
    {
        $paths = [];
        foreach ($this->photos as $photo) {
            $paths[] = $photo->getPath();
        }

        return $paths;
    }

    public function addPhoto(HousePhoto $photo): self
    {
        $this->photos[] = $photo;

        return $this;
    }

    public function setMainPhoto(HousePhoto $newMainPhoto): self
    {
        array_unshift($this->photos, $newMainPhoto);

        return $this;
    }

    public function getMainPhoto(): HousePhoto
    {
        return $this->photos[0];
    }
}
