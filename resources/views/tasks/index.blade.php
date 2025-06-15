@props(['title' => '', 'bodyCssClass' => '', 'categories'])

<x-app-layout :$title :$bodyCssClass>
<div class="container mt-4">
    <h2 class="mb-4">My Tasks</h2>
    <x-task.search :categories="$categories"></x-task.search>
    {{-- Task List --}}
    @forelse ($tasks as $task)
        <x-task.card :task="$task" />
    @empty
        <p class="text-muted">
            No tasks found.
            <a href="{{ route('tasks.create') }}" class="text-decoration-underline">Create one</a>
        </p>
    @endforelse
</div>
</x-app-layout>
