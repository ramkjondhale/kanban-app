@extends('layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>12</h3>
                    <p>Total Projects</p>
                </div>
                <div class="icon"><i class="fas fa-project-diagram"></i></div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>48</h3>
                    <p>Pending Tasks</p>
                </div>
                <div class="icon"><i class="fas fa-tasks"></i></div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>30</h3>
                    <p>Approved Tasks</p>
                </div>
                <div class="icon"><i class="fas fa-check-circle"></i></div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>5</h3>
                    <p>Rejected Tasks</p>
                </div>
                <div class="icon"><i class="fas fa-times-circle"></i></div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>5</h3>
                    <p>Total Developers</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Welcome</h3>
        </div>
        <div class="card-body">
            Laravel + AdminLTE setup completed successfully 🎉.
        </div>
    </div>
@endsection


@push('scripts')
    <script></script>
@endpush