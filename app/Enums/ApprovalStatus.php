<?php

namespace App\Enums;

enum ApprovalStatus: int
{
    case Approved = 1;
    case Rejected = 2;

    public function label(): string
    {
        return match ($this) {
            self::Approved => 'Approved',
            self::Rejected => 'Rejected',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Approved => 'success',
            self::Rejected => 'danger',
        };
    }
}
