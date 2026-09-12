<!-- resources/views/homepage.blade.php -->
<x-base> <!-- x-parent_file_name -->
<x-slot:title>Homepage</x-slot:title>
<div class="m-8">
    <h1 class="text-3xl">Hello {{$user ?? 'Guest'}}, Welcome to Laravel App</h1>
    <br>
    <a 
        href="{{url('/test')}}" 
        class="text-blue-600 hover:text-blue-800 underline hover:no-underline transition-colors"
    >go to test page!</a>    
    <br><br>
    <a 
        href="{{route('aboutPage')}}" 
        class="inline-block px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors"
    >visit about page!</a>
    <!-- ^ named route -->
    <br>    
</div>
</x-base>

<!-- use x-file_name for similar 'at'include , to include a widget -->