<!-- resources/views/users/show.blade.php -->

<x-base>
    <div class="max-w-2xl mx-auto py-10 px-4">
        <div class="bg-white border border-gray-200 rounded-xl p-8 shadow-sm">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $user->name }}</h1>

            <div class="space-y-3 mb-8">
                <p><span class="font-medium text-gray-600">Email:</span> {{ $user->email }}</p>
                <p><span class="font-medium text-gray-600">Created:</span> {{ $user->created_at->format('d M Y, h:i A') }}</p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('users.edit', $user) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg transition">
                    Edit
                </a>
                <a href="{{ route('users.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-lg transition">
                    ← Back to list
                </a>
            </div>
        </div>
    </div>
</x-base>