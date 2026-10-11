<?php

namespace App\Http\Controllers;

use App\Support\DummyData;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', [
            'projects' => DummyData::projects(),
        ]);
    }

    public function show(int $id)
    {
        $project = DummyData::find(DummyData::projects(), $id);
        abort_if($project === null, 404);

        $tasks = collect(DummyData::tasks())->where('project_id', $id)->groupBy('status');

        $columns = [
            'todo'        => 'To Do',
            'in_progress' => 'In Progress',
            'in_review'   => 'In Review',
            'approved'    => 'Approved',
        ];

        return view('projects.show', compact('project', 'tasks', 'columns'));
    }
}
