<!-- resources/views/register-page.blade.php -->

@php
    $inputStyle = "w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500 outline-none";
    $buttonStyle = "w-full py-2.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg cursor-pointer";
    $labelStyle = "block text-sm font-medium text-gray-700 mb-1";
@endphp

<x-base>
    <x-slot:title>Register Form</x-slot:title>

    <h1 class="text-2xl font-bold mb-4">Submit Your Info</h1>

    <!-- form for post request -->
    <form action="{{route('formsubmitted')}}" method="POST" class="max-w-md mx-auto p-6 bg-white rounded-xl shadow-md space-y-4">
        @csrf
        <div class="text-gray-500">form to show post request</div>
        @if (session('success'))
            <div class="my-4 p-3 bg-green-100 text-green-700 rounded-md text-sm">{{ session('success') }}</div>
        @endif
        
        <div>
            <label for="fullname" class="{{$labelStyle}}">Full name:</label>
            <input required type="text" id="fullname" name="fullname" value="{{ old('fullname') }}" placeholder="Type your full name" class="{{ $inputStyle }}">
            @error('fullname') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="email" class="{{$labelStyle}}">Email:</label>
            <input required type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Type your email" class="{{ $inputStyle }}">
            @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="password" class="{{$labelStyle}}">Password:</label>
            <input required type="password" id="password" name="password" placeholder="Type your password" class="{{ $inputStyle }}">
            @error('password') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="password_confirmation" class="{{$labelStyle}}">Confirm Password:</label>
            <input required type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" class="{{ $inputStyle }}">
        </div>

        <button 
            type="submit" class="{{ $buttonStyle }}"            
        >Submit</button>
    </form>
</x-base>
