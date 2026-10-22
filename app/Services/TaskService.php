<?php

namespace App\Services;

use App\Enums\TaskStatus;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TaskService
{
    public function create(Project $project, array $data, int $creatorId): Task
    {
        return DB::transaction(function () use ($project, $data, $creatorId) {
            $task = $project->tasks()->create([
                ...Arr::except($data, ['tags']),
                'status'     => TaskStatus::Todo,
                'created_by' => $creatorId,
            ]);

            $this->syncTags($task, $data['tags'] ?? null);

            return $task;
        });
    }

    public function update(Task $task, array $data): Task
    {
        return DB::transaction(function () use ($task, $data) {
            $task->update(Arr::except($data, ['tags']));
            $this->syncTags($task, $data['tags'] ?? null);

            return $task;
        });
    }

    public function delete(Task $task): void
    {
        $task->delete(); // soft delete
    }

    // "Backend, UI, backend" => finds or creates each tag, then syncs the pivot table
    private function syncTags(Task $task, ?string $tags): void
    {
        $ids = collect(explode(',', (string) $tags))
            ->map(fn(string $name) => trim($name))
            ->filter()
            ->map(fn(string $name) => Tag::firstOrCreate(['name' => $name])->id)
            ->unique()
            ->values()
            ->all();

        $task->tags()->sync($ids);
    }
}
