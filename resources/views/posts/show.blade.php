<!-- resources/views/posts/show.blade.php -->
<x-base>
    <x-slot:title>View a Post</x-slot:title>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <div class="bg-white border border-gray-200 rounded-xl p-8 shadow-sm">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>

            <div class="prose max-w-none text-gray-700 mb-8 whitespace-pre-line">
                {{ $post->body }}
            </div>

            <div class="flex gap-3">
                <a href="{{ route('posts.edit', $post) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg transition">
                    Edit
                </a>
                <a href="{{ route('posts.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-lg transition">
                    ← Back to list
                </a>
            </div>
        </div>
    </div>
</x-base>
<!-- example: /posts/1 -->