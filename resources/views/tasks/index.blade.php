
@extends('layouts.main')

@section('content')

<h1>Task List</h1>

<p>Manage and view your daily tasks.</p>

<a class="button" href="{{ route('tasks.create') }}">Create New Task</a>

<br><br>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->task_date->format('M d, Y') }}</td>
                <td>{{ ucfirst($task->status) }}</td>
                <td>
                    <a href="{{ route('tasks.edit', ['id' => $task->id]) }}"
                    style="color: blue !important; display: inline-block !important; visibility: visible !important; margin-right: 15px;">
                        EDIT TASK
                    </a>

                    <form method="POST"
                          action="{{ route('tasks.destroy', ['id' => $task->id]) }}"
                          style="display:inline;"
                          onsubmit="return confirm('Archive this task?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Archive</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No tasks available.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
