<div class="card card-outline card-{{ $task->priority->color() }} mb-2">
    <div class="card-body p-2">
        <a href="{{ route('tasks.show', $task) }}" class="font-weight-bold">
            {{ $task->title }}
        </a>

        <div class="mt-1">
            @foreach ($task->tags as $tag)
                <span class="badge badge-light border">{{ $tag->name }}</span>
            @endforeach
        </div>

        <div class="d-flex justify-content-between mt-2">
            <small><i class="fas fa-user"></i> {{ $task->assignee?->name ?? 'Unassigned' }}</small>
            <small><i class="far fa-calendar"></i> {{ $task->due_date?->format('d M') ?? '-' }}</small>
        </div>
    </div>
</div>