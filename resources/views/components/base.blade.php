<?php
/*
  file: resources/views/components/base.blade.php (keep in components folder)
  laravel layout, written in modern Blade Component Approach
  home, register, etc pages uses it.
*/
$styleNavLink = "text-white font-bold hover:text-blue-100 transition"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Website' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Common Header / Navbar -->
    <nav class="bg-blue-600 p-4">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            {{-- Logo / App Name --}}
            <a href="/" class="{{$styleNavLink}}">
                Home
            </a>
            {{-- Navigation Links --}}
            <div class="flex gap-6">
                <a href="{{route('registerPage')}}" class="{{$styleNavLink}}">Register</a>
                <a href="{{ route('users.index') }}" class="{{$styleNavLink}}">Users</a>
                <a href="{{ route('posts.index') }}" class="{{$styleNavLink}}">Posts</a>
                <a href="{{ route('posts.create') }}" class="{{$styleNavLink}}">Create Post</a>
            {{-- You can add more links later --}}            
        </div>

        </div>
    </nav>

    <!-- Dynamic Content Area -->
    <main class="max-w-4xl mx-auto p-6">
        {{ $slot }}
    </main>

    <!-- Common Footer -->
    <footer class="text-center p-4 text-gray-500 text-sm">
        &copy; {{ date('Y') }} My Laravel App
    </footer>
</body>
</html>