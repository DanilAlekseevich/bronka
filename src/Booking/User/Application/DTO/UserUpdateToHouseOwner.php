<?php

declare(strict_types=1);

namespace Booking\User\Application\DTO;

final readonly class UserUpdateToHouseOwner
{
    // Далее требуется добавить данные пользователя(паспорт) для подтверждения прав собственности
    public function __construct(
        public string $userId
    )
    {
    }
}