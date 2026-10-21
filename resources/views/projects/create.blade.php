@extends('layouts.app')

@section('title', 'New Project')
@section('page_title', 'New Project')

@section('content')
<div class="card">
    <form action="{{ route('projects.store') }}" method="post">
        <div class="card-body">
            @include('projects._form')
        </div>
    </form>
</div>
@endsection