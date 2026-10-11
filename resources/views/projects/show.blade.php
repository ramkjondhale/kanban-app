@extends('layouts.app')

@section('title', $project['name'])
@section('page_title', $project['name'] . ' - Board')

@push('styles')
<style>
    .kanban-column {
        background: #f4f6f9;
        border-radius: 4px;
        min-height: 300px;
    }
</style>
@endpush

@section('content')
<a href="{{ route('projects.index') }}" class="btn btn-sm btn-secondary mb-3">
    <i class="fas fa-arrow-left"></i> Back
</a>

<div class="row">
    @foreach ($columns as $key => $label)
    <div class="col-md-3">
        <div class="kanban-column p-2">
            <h6 class="font-weight-bold">
                {{ $label }}
                <span class="badge badge-dark">{{ $tasks->get($key, collect())->count() }}</span>
            </h6>

            @forelse ($tasks->get($key, []) as $task)
            @include('partials.task-card', ['task' => $task])
            @empty
            <p class="text-muted small">No task found</p>
            @endforelse
        </div>
    </div>
    @endforeach
</div>
@endsection