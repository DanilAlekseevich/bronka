<?php

namespace Booking\Booking\Domain;

interface BookingRepositoryInterface
{
    public function create(Booking $booking): void;
}