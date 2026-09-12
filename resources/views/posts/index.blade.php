<!-- list all posts -->
<!-- resources/views/posts/index.blade.php -->
 
<x-base>
    <x-slot:title>all posts</x-slot:title>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">All Posts</h1>
            <a href="{{ route('posts.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition">
                + Create New Post
            </a>
            <!-- ^ the route here posts.create points to inclusion of 'posts' in routes/web.php file, 
              which in PostController points to resources/views/posts/create.blade.php 
            -->
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @forelse($posts as $post)
            <div class="bg-white border border-gray-200 rounded-xl p-6 mb-5 shadow-sm hover:shadow-md transition">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                <p class="text-gray-600 mb-4 line-clamp-2">{{ $post->body }}</p>

                <div class="flex gap-3 text-sm">
                    <a href="{{ route('posts.show', $post) }}"
                       class="text-blue-600 hover:underline">View</a>
                    <a href="{{ route('posts.edit', $post) }}"
                       class="text-yellow-600 hover:underline">Edit</a>

                    <form action="{{ route('posts.destroy', $post) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('DELETE') <!-- simulates a DELETE request, because html supports only GET and POST -->
                        <button type="submit" class="text-red-600 hover:underline">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-16 text-gray-500">
                <p class="text-lg">No posts yet.</p>
                <a href="{{ route('posts.create') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                    Create your first post
                </a>
            </div>
        @endforelse
    </div>
</x-base>