@extends('layouts.app')

@section('title', $task->title)
@section('page_title', 'Task Details')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $task->title }}</h3>
            </div>
            <div class="card-body">
                <p>{{ $task->description ?: 'No description.' }}</p>

                @if ($task->status->isPendingApproval())
                <div class="alert alert-warning">This task is waiting for approval.</div>
                @elseif ($task->status === App\Enums\TaskStatus::Approved)
                <div class="alert alert-success">This task has been approved.</div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <p><b>Project:</b> {{ $task->project->name }}</p>
                <p><b>Status:</b>
                    <span class="badge badge-{{ $task->status->color() }}">{{ $task->status->label() }}</span>
                </p>
                <p><b>Priority:</b>
                    <span class="badge badge-{{ $task->priority->color() }}">{{ $task->priority->label() }}</span>
                </p>
                <p><b>Assignee:</b> {{ $task->assignee?->name ?? 'Unassigned' }}</p>
                <p><b>Created by:</b> {{ $task->creator->name }}</p>
                <p><b>Due:</b> {{ $task->due_date?->format('d M Y') ?? '-' }}</p>
                <p><b>Tags:</b>
                    @forelse ($task->tags as $tag)
                    <span class="badge badge-info">{{ $tag->name }}</span>
                    @empty
                    -
                    @endforelse
                </p>

                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-block">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="post"
                    onsubmit="return confirm('Delete this task?')" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-block">Delete</button>
                </form>
                <a href="{{ route('projects.show', $task->project) }}" class="btn btn-secondary btn-block mt-2">
                    Back to board
                </a>
            </div>
        </div>
    </div>
</div>
@endsection