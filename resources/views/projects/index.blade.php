@extends('layouts.app')

@section('title', 'Projects')
@section('page_title', 'Projects')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Projects</h3>
        <div class="card-tools">
            <a href="{{ route('projects.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> New Project
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Manager</th>
                    <th>Tasks</th>
                    <th style="width: 200px">Progress</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr>
                    <td>{{ $projects->firstItem() + $loop->index }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->manager->name }}</td>
                    <td><span class="badge badge-info">{{ $project->tasks_count }}</span></td>
                    <td>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" style="width: {{ $project->progress }}%"></div>
                        </div>
                        <small>{{ $project->progress }}%</small>
                    </td>
                    <td>
                        <span class="badge badge-{{ $project->status->color() }}">
                            {{ $project->status->label() }}
                        </span>
                    </td>
                    <td>{{ $project->due_date?->format('d M Y') ?? '-' }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-primary">Board</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No projects yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $projects->links() }}
    </div>
</div>
@endsection