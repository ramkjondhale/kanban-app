<?php

namespace App\Models;

use App\Enums\ApprovalLevel;
use App\Enums\ApprovalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApprovalLog extends Model
{
    protected $fillable = [
        'task_id',
        'user_id',
        'level',
        'action',
        'comment',
    ];

    protected function casts(): array
    {
        return [
            'level'  => ApprovalLevel::class,
            'action' => ApprovalStatus::class,
        ];
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    // The person who approved or rejected
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
