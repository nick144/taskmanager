@props(['title' => '', 'bodyCssClass' => ''])

<x-app-layout :$title :$bodyCssClass>
<div class="container mt-5">
    <h2 class="mb-4">Category List</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add New Category</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created At</th>
                {{-- <th width="180">Actions</th> --}}
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $index => $category)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at->format('d M Y') }}</td>

                    {{-- <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td> --}}
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>
