<?php

namespace App\Enums;

enum TaskPriority: int
{
    case Low    = 1;
    case Medium = 2;
    case High   = 3;

    public function label(): string
    {
        return match ($this) {
            self::Low    => 'Low',
            self::Medium => 'Medium',
            self::High   => 'High',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Low    => 'secondary',
            self::Medium => 'warning',
            self::High   => 'danger',
        };
    }
}
