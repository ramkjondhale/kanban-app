<?php

namespace App\Enums;

enum UserRole: int
{
    case Admin     = 1; // CTO
    case Hr        = 2;
    case Manager   = 3;
    case TeamLead  = 4;
    case Developer = 5;

    public function label(): string
    {
        return match ($this) {
            self::Admin     => 'Admin (CTO)',
            self::Hr        => 'HR',
            self::Manager   => 'Manager',
            self::TeamLead  => 'Team Lead',
            self::Developer => 'Developer',
        };
    }
}
