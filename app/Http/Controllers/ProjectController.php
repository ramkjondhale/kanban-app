<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Enums\TaskStatus;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\User;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    public function __construct(private ProjectService $projects) {}

    public function index()
    {
        return view('projects.index', [
            'projects' => $this->projects->paginate(),
        ]);
    }

    public function create()
    {
        return view('projects.create', $this->formData(new Project()));
    }

    public function store(ProjectRequest $request)
    {
        $project = $this->projects->create($request->validated());

        return redirect()->route('projects.show', $project)->with('success', 'Project created.');
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project->load('manager'),
            'tasks'   => $this->projects->board($project),
            'columns' => TaskStatus::cases(),
        ]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', $this->formData($project));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $this->projects->update($project, $request->validated());

        return redirect()->route('projects.show', $project)->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $this->projects->delete($project);

        return redirect()->route('projects.index')->with('success', 'Project deleted.');
    }

    private function formData(Project $project): array
    {
        return [
            'project'    => $project,
            'managers'   => User::active()->withRole(UserRole::Manager)->orderBy('name')->get(),
            'developers' => User::active()->withRole(UserRole::Developer)->orderBy('name')->get(),
        ];
    }
}
