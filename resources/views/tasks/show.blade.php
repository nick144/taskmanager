@props(['title' => '', 'bodyCssClass' => ''])

<x-app-layout :$title :$bodyCssClass>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Task Details</h4>
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
        </div>

        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            
            @if($task->description)
                <p class="card-text">{{ $task->description }}</p>
            @endif

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($task->status) }}</li>
                <li class="list-group-item"><strong>Priority:</strong> {{ ucfirst($task->priority) }}</li>
                <li class="list-group-item"><strong>Due Date:</strong> {{ $task->due_date ? $task->due_date->format('d M Y, h:i A') : 'Not set' }}</li>
                <li class="list-group-item"><strong>Created At:</strong> {{ $task->created_at->format('d M Y, h:i A') }}</li>
                @if ($task->category)
                    <li class="list-group-item"><strong>Category:</strong> {{ $task->category->name }}</li>
                @endif
            </ul>
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>

            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Are you sure you want to delete this task?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
</x-app-layout>
