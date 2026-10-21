@extends('layouts.app')

@section('title', 'Edit Task')
@section('page_title', 'Edit Task')

@section('content')
<div class="card">
    <form action="{{ route('tasks.update', $task) }}" method="post">
        @method('PUT')
        <div class="card-body">
            @include('tasks._form')
        </div>
    </form>
</div>
@endsection