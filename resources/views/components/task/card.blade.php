@props(['task'])

<div class="card mb-3">
    <div class="card-body d-flex justify-content-between align-items-start">
        <div class="col-9">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text">{{ $task->description }}</p>
            <small class="text-muted">
                <strong>Status:</strong> {{ ucfirst($task->status) }} |
                <strong>Priority:</strong> {{ ucfirst($task->priority) }} |
                <strong>Due:</strong>
                {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d M Y, h:i A') : 'N/A' }} |
                <strong>Category:</strong> {{ $task->category->name ?? 'None' }}
            </small>
        </div>
        <div class="col-3 text-end">
            <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-outline-primary me-2">Show</a>
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
            <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
