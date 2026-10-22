@extends('layouts.app')

@section('title', 'New Task')
@section('page_title', 'New Task in ' . $project->name)

@section('content')
<div class="card">
    <form action="{{ route('projects.tasks.store', $project) }}" method="post">
        <div class="card-body">
            @include('tasks._form')
        </div>
    </form>
</div>
@endsection