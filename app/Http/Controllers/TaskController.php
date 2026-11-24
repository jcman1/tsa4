<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Mail\TaskCompletedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    // Display all active tasks
    public function index()
    {
        $tasks = Task::where('is_archived', false)
            ->orderBy('task_date', 'asc')
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    // Show create task form
    public function create()
    {
        return view('tasks.create');
    }

    // Save new task
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'task_date' => 'required|date',
            'status' => 'required|in:pending,done',
        ]);

        $validated['is_archived'] = false;

        Task::create($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    // Show edit task form
    public function edit($id)
    {
        $task = Task::where('is_archived', false)->findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    // Update task and send completion email
    public function update(Request $request, $id)
    {
        $task = Task::where('is_archived', false)->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'task_date' => 'required|date',
            'status' => 'required|in:pending,done',
        ]);

        $wasDone = $task->status === 'done';

        $task->update($validated);

        if (!$wasDone && $task->status === 'done') {
            Mail::to(config('tasks.notification_email'))
                ->send(new TaskCompletedMail($task));
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    // Soft delete task by archiving it
    public function destroy($id)
    {
        $task = Task::where('is_archived', false)->findOrFail($id);

        $task->update([
            'is_archived' => true,
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task archived successfully.');
    }
}
