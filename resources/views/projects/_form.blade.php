@csrf

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" id="name" name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $project->name) }}">
    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="3"
        class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
    @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label for="manager_id">Manager</label>
    <select id="manager_id" name="manager_id" class="form-control @error('manager_id') is-invalid @enderror">
        <option value="">-- Select manager --</option>
        @foreach ($managers as $manager)
        <option value="{{ $manager->id }}" @selected(old('manager_id', $project->manager_id) == $manager->id)>
            {{ $manager->name }}
        </option>
        @endforeach
    </select>
    @error('manager_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label for="due_date">Due Date</label>
    <input type="date" id="due_date" name="due_date"
        class="form-control @error('due_date') is-invalid @enderror"
        value="{{ old('due_date', $project->due_date?->format('Y-m-d')) }}">
    @error('due_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

@php
$selectedApprovers = old('approver_ids', $project->exists ? $project->approvers->pluck('id')->all() : []);
@endphp
<div class="form-group">
    <label for="approver_ids">Approvers (developers who can approve/reject tasks)</label>
    <select id="approver_ids" name="approver_ids[]" multiple class="form-control" style="height: 120px">
        @foreach ($developers as $developer)
        <option value="{{ $developer->id }}" @selected(in_array($developer->id, $selectedApprovers))>
            {{ $developer->name }}
        </option>
        @endforeach
    </select>
    <small class="text-muted">Hold Ctrl to select more than one.</small>
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>