@props(['title' => '', 'bodyCssClass' => ''])

<x-app-layout :$title :$bodyCssClass>
<div class="container mt-5">
    <h2 class="mb-4">Edit Category</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input 
                type="text" 
                name="name" 
                class="form-control" 
                value="{{ old('name', $category->name) }}" 
                required
            >
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</x-app-layout>
