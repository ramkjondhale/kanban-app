<?php

namespace App\Http\Controllers;

use App\Support\DummyData;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function show(int $id)
    {
        $task = DummyData::find(DummyData::tasks(), $id);
        abort_if($task === null, 404);

        return view('tasks.show', compact('task'));
    }
}
