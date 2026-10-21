@csrf

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" name="title"
        class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $task->title) }}">
    @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="3"
        class="form-control @error('description') is-invalid @enderror">{{ old('description', $task->description) }}</textarea>
    @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="priority">Priority</label>
            <select id="priority" name="priority" class="form-control @error('priority') is-invalid @enderror">
                @foreach (App\Enums\TaskPriority::cases() as $priority)
                <option value="{{ $priority->value }}"
                    @selected(old('priority', $task->priority?->value ?? App\Enums\TaskPriority::Medium->value) == $priority->value)>
                    {{ $priority->label() }}
                </option>
                @endforeach
            </select>
            @error('priority') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="assigned_to">Assign to</label>
            <select id="assigned_to" name="assigned_to" class="form-control @error('assigned_to') is-invalid @enderror">
                <option value="">-- Select developer --</option>
                @foreach ($developers as $developer)
                <option value="{{ $developer->id }}" @selected(old('assigned_to', $task->assigned_to) == $developer->id)>
                    {{ $developer->name }}
                </option>
                @endforeach
            </select>
            @error('assigned_to') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date"
                class="form-control @error('due_date') is-invalid @enderror"
                value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}">
            @error('due_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="tags">Tags</label>
    <input type="text" id="tags" name="tags" placeholder="Backend, UI, Auth"
        class="form-control @error('tags') is-invalid @enderror"
        value="{{ old('tags', $task->exists ? $task->tags->pluck('name')->implode(', ') : '') }}">
    <small class="text-muted">Separate tags with a comma.</small>
    @error('tags') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{ route('projects.show', $project) }}" class="btn btn-secondary">Cancel</a>