<!-- resources/views/users/create.blade.php -->
<x-base>
    <div class="max-w-2xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Create New User</h1>

        <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       @class([
                           'w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none',
                           'border-red-500' => $errors->has('name'),
                           'border-gray-300' => !$errors->has('name'),
                       ])>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       @class([
                           'w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none',
                           'border-red-500' => $errors->has('email'),
                           'border-gray-300' => !$errors->has('email'),
                       ])>
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password"
                       @class([
                           'w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none',
                           'border-red-500' => $errors->has('password'),
                           'border-gray-300' => !$errors->has('password'),
                       ])>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
                    Save User
                </button>
                <a href="{{ route('users.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-base>