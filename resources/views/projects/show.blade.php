@extends('layouts.app')

@section('title', $project->name)
@section('page_title', $project->name . ' - Board')

@push('styles')
<style>
    .kanban-column {
        background: #f4f6f9;
        border-radius: 4px;
        min-height: 300px;
    }

    .kanban-column h6 {
        font-size: 0.85rem;
    }
</style>
@endpush

@section('content')
<div class="mb-3 d-flex">
    <a href="{{ route('projects.index') }}" class="btn btn-sm btn-secondary mr-2">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <a href="{{ route('projects.tasks.create', $project) }}" class="btn btn-sm btn-primary mr-2">
        <i class="fas fa-plus"></i> Add Task
    </a>
    <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-warning mr-2">
        <i class="fas fa-edit"></i> Edit
    </a>
    <form action="{{ route('projects.destroy', $project) }}" method="post"
        onsubmit="return confirm('Delete this project?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
    </form>
</div>

<p class="text-muted">
    Manager: <b>{{ $project->manager->name }}</b> |
    Progress: <b>{{ $project->progress }}%</b>
</p>

<div class="row">
    @foreach ($columns as $status)
    <div class="col-lg-2 col-md-4">
        <div class="kanban-column p-2">
            <h6 class="font-weight-bold">
                {{ $status->label() }}
                <span class="badge badge-dark">{{ $tasks->get($status->value, collect())->count() }}</span>
            </h6>

            @forelse ($tasks->get($status->value, collect()) as $task)
            @include('partials.task-card', ['task' => $task])
            @empty
            <p class="text-muted small">No tasks</p>
            @endforelse
        </div>
    </div>
    @endforeach
</div>
@endsection