<?php

namespace App\Services;

use App\Enums\TaskStatus;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProjectService
{
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return Project::query()
            ->with('manager')
            ->withCount([
                'tasks',
                'tasks as approved_tasks_count' => fn($query) => $query->where('status', TaskStatus::Approved),
            ])
            ->latest()
            ->paginate($perPage);
    }

    public function board(Project $project): Collection
    {
        return $project->tasks()
            ->with(['assignee', 'tags'])
            ->get()
            ->groupBy(fn(Task $task) => $task->status->value);
    }

    public function create(array $data): Project
    {
        return DB::transaction(function () use ($data) {
            $project = Project::create(Arr::except($data, ['approver_ids']));
            $project->approvers()->sync($data['approver_ids'] ?? []);

            return $project;
        });
    }

    public function update(Project $project, array $data): Project
    {
        return DB::transaction(function () use ($project, $data) {
            $project->update(Arr::except($data, ['approver_ids']));
            $project->approvers()->sync($data['approver_ids'] ?? []);

            return $project;
        });
    }

    public function delete(Project $project): void
    {
        $project->delete();
    }
}
