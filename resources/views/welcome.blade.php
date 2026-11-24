
@extends('layouts.main')

@section('content')

<h1>Welcome to Tasks for Today</h1>

<p>A simple task management system to help you organize your daily activities.</p>

<a class="button" href="{{ route('tasks.index') }}">View Task List</a>

@guest
    <p>Log in or register to start managing your tasks.</p>
    <a href="{{ route('login') }}">Login</a>
    |
    <a href="{{ route('register') }}">Register</a>
@endguest

@endsection
