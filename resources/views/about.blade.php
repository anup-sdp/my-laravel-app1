<?php 
  // file: resources/views/about.blade.php 
  // page at http://127.0.0.1:8000/about
?>

@extends('components.base2')
@section('title', 'about page')

@section('content')
<div class="bg-indigo-50">
    <h1 class="text-2xl text-green-700 font-bold mb-4">About Page</h1>
    <p>learning php/laravel</p>
    <img src="{{asset('images/winter1.png')}}" alt="winter image">
</div>
@endsection

<!-- also see 'at'include -->