<?php

namespace App\Models\Enums;

enum ImageSizeENUM: string
{
    case Large = 'large';
    case Medium = 'medium';
    case Thumbnail = 'thumbnail';

    public function getLabel(): string
    {
        return match ($this) {
            self::Large => 'Large',
            self::Thumbnail => 'thumbnail',

            default => 'Medium',
        };
    }
}
