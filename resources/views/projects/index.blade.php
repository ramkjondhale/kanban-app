@extends('layouts.app')

@section('title', 'Projects')
@section('page_title', 'Projects')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Projects</h3>
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
                    <th>Due Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $project['name'] }}</td>
                    <td>{{ $project['manager'] }}</td>
                    <td><span class="badge badge-info">{{ $project['tasks'] }}</span></td>
                    <td>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" style="width: {{ $project['progress'] }}%"></div>
                        </div>
                        <small>{{ $project['progress'] }}%</small>
                    </td>
                    <td>{{ $project['due_date'] }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project['id']) }}" class="btn btn-sm btn-primary">
                            Board
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No projects found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection