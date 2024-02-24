<?php

namespace App\Models\Enums;

enum AcquisitionTypesENUM: int
{
    case Sale = 1;
    case Renting = 2;
    case Rental_sale = 3;

    public function getLabel(): string
    {
        return match ($this) {
            self::Sale => __('front.renting'),
            self::Renting => __('front.selling'),

            default => __('front.renting'),
        };
    }
}
