<?php

namespace App\Enums;

enum ApprovalLevel: int
{
    case TeamLead = 1;
    case Manager  = 2;
    case Cto      = 3;

    public function label(): string
    {
        return match ($this) {
            self::TeamLead => 'Team Lead',
            self::Manager  => 'Manager',
            self::Cto      => 'CTO',
        };
    }
}
