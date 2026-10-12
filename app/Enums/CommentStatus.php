<?php

namespace App\Enums;

enum CommentStatus: int
{
    case Open     = 1;
    case Resolved = 2;

    public function label(): string
    {
        return match ($this) {
            self::Open     => 'Open',
            self::Resolved => 'Resolved',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Open     => 'warning',
            self::Resolved => 'success',
        };
    }
}
