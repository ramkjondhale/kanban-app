@extends('layouts.app')

@section('title', 'Edit Project')
@section('page_title', 'Edit Project')

@section('content')
<div class="card">
    <form action="{{ route('projects.update', $project) }}" method="post">
        @method('PUT')
        <div class="card-body">
            @include('projects._form')
        </div>
    </form>
</div>
@endsection