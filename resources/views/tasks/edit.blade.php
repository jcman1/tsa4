
@extends('layouts.main')

@section('content')

<h1>Edit Task</h1>

@if($errors->any())
    <div class="error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('tasks.update', $task->id) }}">
    @csrf
    @method('PUT')

    <label>Task Title</label>
    <input type="text" name="title" value="{{ old('title', $task->title) }}" required>

    <label>Description</label>
    <textarea name="description">{{ old('description', $task->description) }}</textarea>

    <label>Task Date</label>
    <input type="date" name="task_date" value="{{ old('task_date', $task->task_date->format('Y-m-d')) }}" required>

    <label>Status</label>
    <select name="status" required>
        <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="done" {{ old('status', $task->status) == 'done' ? 'selected' : '' }}>Done</option>
    </select>

    <button type="submit">Update Task</button>
    <a href="{{ route('tasks.index') }}">Cancel</a>
</form>

@endsection
