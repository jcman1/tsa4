
@extends('layouts.main')

@section('content')

<h1>Profile</h1>

<p>Welcome to the profile page of Tasks for Today.</p>

@auth
    <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
@else
    <p>You are currently viewing this page as a guest.</p>
    <a href="{{ route('login') }}">Login</a>
@endauth

@endsection
