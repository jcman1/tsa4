
<!DOCTYPE html>
<html>
<head>
    <title>Tasks for Today</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            color: #222;
        }

        nav {
            background: #222;
            padding: 18px;
        }

        nav a, nav span {
            color: white;
            margin-right: 20px;
            text-decoration: none;
        }

        .container {
            width: 85%;
            max-width: 1000px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 6px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            box-sizing: border-box;
        }

        button, .button {
            background: #222;
            color: white;
            padding: 10px 16px;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }

        .success {
            background: #d4edda;
            padding: 12px;
            margin-bottom: 15px;
        }

        .error {
            color: #b00020;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border-bottom: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .inline {
            display: inline;
        }
    </style>
</head>
<body>

<nav>
    <a href="{{ route('welcome') }}">Home</a>
    <a href="{{ route('tasks.index') }}">Task List</a>
    <a href="{{ route('profile') }}">Profile</a>
    <a href="{{ route('about') }}">About</a>

    @auth
    <span>Welcome, {{ auth()->user()->name }}</span>

    <form class="inline" method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
@endauth

<div class="container">

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>
