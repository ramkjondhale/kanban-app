<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Services\TaskService;

class TaskController extends Controller
{
    public function __construct(private TaskService $tasks) {}

    public function create(Project $project)
    {
        return view('tasks.create', [
            'project'    => $project,
            'task'       => new Task(),
            'developers' => $this->developers(),
        ]);
    }

    public function store(TaskRequest $request, Project $project)
    {
        $task = $this->tasks->create($project, $request->validated(), $this->actingUserId());

        return redirect()->route('tasks.show', $task)->with('success', 'Task created.');
    }

    public function show(Task $task)
    {
        $task->load(['project', 'assignee', 'creator', 'tags']);

        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task'       => $task->load('tags'),
            'project'    => $task->project,
            'developers' => $this->developers(),
        ]);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $this->tasks->update($task, $request->validated());

        return redirect()->route('tasks.show', $task)->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $project = $task->project;
        $this->tasks->delete($task);

        return redirect()->route('projects.show', $project)->with('success', 'Task deleted.');
    }

    private function developers()
    {
        return User::active()->withRole(UserRole::Developer)->orderBy('name')->get();
    }

    // TEMP: there is no login yet, so use the first user as "the person who created it".
    // Phase 6 replaces this whole method with auth()->id()
    private function actingUserId(): int
    {
        return User::query()->value('id');
    }
}
