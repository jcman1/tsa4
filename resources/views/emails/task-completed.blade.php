<h1>Task Completed!</h1>

<p>The following task has been marked as done:</p>

<p><strong>{{ $task->title }}</strong></p>

<p>{{ $task->description }}</p>

<p>Task Date: {{ $task->task_date->format('F j, Y') }}</p>
