@extends('layouts.app')

@section('title', $task['title'])
@section('page_title', 'Task Details')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $task['title'] }}</h3>
            </div>
            <div class="card-body">
                <p>{{ $task['description'] }}</p>

                @if ($task['status'] === 'in_review')
                <div class="alert alert-warning">This task is waiting for approval.</div>
                @elseif ($task['status'] === 'approved')
                <div class="alert alert-success">This task has been approved.</div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <p><b>Status:</b> {{ str_replace('_', ' ', ucfirst($task['status'])) }}</p>
                <p><b>Priority:</b> {{ ucfirst($task['priority']) }}</p>
                <p><b>Assignee:</b> {{ $task['assignee'] }}</p>
                <p><b>Due:</b> {{ $task['due_date'] }}</p>
                <p><b>Tags:</b>
                    @foreach ($task['tags'] as $tag)
                    <span class="badge badge-info">{{ $tag }}</span>
                    @endforeach
                </p>
                <a href="{{ route('projects.show', $task['project_id']) }}" class="btn btn-secondary btn-block">
                    Back to Board
                </a>
            </div>
        </div>
    </div>
</div>
@endsection