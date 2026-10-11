@php
$badge = ['high' => 'danger', 'medium' => 'warning', 'low' => 'secondary'][$task['priority']] ?? 'secondary';
@endphp

<div class="card card-outline card-{{ $badge }} mb-2">
    <div class="card-body p-2">
        <a href="{{ route('tasks.show', $task['id']) }}" class="font-weight-bold">
            {{ $task['title'] }}
        </a>

        <div class="mt-1">
            @foreach ($task['tags'] as $tag)
            <span class="badge badge-light border">{{ $tag }}</span>
            @endforeach
        </div>

        <div class="d-flex justify-content-between mt-2">
            <small><i class="fas fa-user"></i> {{ $task['assignee'] }}</small>
            <small><i class="far fa-calendar"></i> {{ $task['due_date'] }}</small>
        </div>
    </div>
</div>