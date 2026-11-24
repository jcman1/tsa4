
@extends('layouts.main')

@section('content')

<h1>Create Task</h1>

@if($errors->any())
    <div class="error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('tasks.store') }}">
    @csrf

    <label>Task Title</label>
    <input type="text" name="title" value="{{ old('title') }}" required>

    <label>Description</label>
    <textarea name="description">{{ old('description') }}</textarea>

    <label>Task Date</label>
    <input type="date" name="task_date" value="{{ old('task_date') }}" required>

    <label>Status</label>
    <select name="status" required>
        <option value="pending">Pending</option>
        <option value="done">Done</option>
    </select>

    <button type="submit">Save Task</button>
    <a href="{{ route('tasks.index') }}">Cancel</a>
</form>

@endsection
