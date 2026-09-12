<!-- resources/views/posts/edit.blade.php -->
<x-base>
    <x-slot:title>Edit Post</x-slot:title>
    <div class="max-w-2xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Edit Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT') <!-- simulate PUT request -->

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                       {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Body</label>
                <textarea name="body" rows="6"
                          class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                          {{ $errors->has('body') ? 'border-red-500' : 'border-gray-300' }}">{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
                    Update Post
                </button>
                <a href="{{ route('posts.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-base>