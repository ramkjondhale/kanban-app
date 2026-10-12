<?php

namespace App\Enums;

enum ProjectStatus: int
{
    case Active    = 1;
    case Completed = 2;

    public function label(): string
    {
        return match ($this) {
            self::Active    => 'Active',
            self::Completed => 'Completed',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Active    => 'primary',
            self::Completed => 'success',
        };
    }
}
