<?php

namespace App\Enums;

enum TaskStatus: int
{
    case Todo           = 1;
    case InProgress     = 2;
    case PendingTl      = 3;
    case PendingManager = 4;
    case PendingCto     = 5;
    case Approved       = 6;

    public function label(): string
    {
        return match ($this) {
            self::Todo           => 'To Do',
            self::InProgress     => 'In Progress',
            self::PendingTl      => 'Pending TL Approval',
            self::PendingManager => 'Pending Manager Approval',
            self::PendingCto     => 'Pending CTO Approval',
            self::Approved       => 'Approved',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Todo           => 'secondary',
            self::InProgress     => 'info',
            self::PendingTl,
            self::PendingManager,
            self::PendingCto     => 'warning',
            self::Approved       => 'success',
        };
    }

    public function isPendingApproval(): bool
    {
        return in_array($this, [self::PendingTl, self::PendingManager, self::PendingCto], true);
    }
}
