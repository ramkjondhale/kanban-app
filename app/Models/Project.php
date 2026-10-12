<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'manager_id',
        'status',
        'due_date',
    ];

    protected function casts(): array
    {
        return [
            'status'   => ProjectStatus::class,
            'due_date' => 'date',
        ];
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    // Specific developers who can approve/reject tasks of this project
    public function approvers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_approvers', 'project_id', 'user_id')
            ->withTimestamps();
    }

    // Accessor: $project->progress gives a percentage
    public function getProgressAttribute(): int
    {
        $total = $this->tasks()->count();

        if ($total === 0) {
            return 0;
        }

        $approved = $this->tasks()->where('status', TaskStatus::Approved)->count();
        return (int) round(($approved / $total) * 100);
    }
}
