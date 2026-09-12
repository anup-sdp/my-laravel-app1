<!-- 
  resources/views/components/base2.blade.php  
  laravel layout, written in Blade Inheritance Approach (older)
  about.blade.php uses it
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-green-50">
    <nav class="bg-gray-600 p-4 text-white font-bold">
        <a href="/">Home</a> | <a href="{{ route('registerPage') }}">Register</a>
    </nav>

    <!-- Content insertion marker -->
    <main class="max-w-4xl mx-auto p-6">
        @yield('content')
    </main>

    <footer class="text-center p-4 text-gray-500 text-sm">
        &copy; {{ date('Y') }} My Laravel App
    </footer>
</body>
</html>