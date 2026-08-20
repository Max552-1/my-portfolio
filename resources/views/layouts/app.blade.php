<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Dinesh Portfolio')
    </title>

    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    @if(request()->is('admin*'))
    <link rel="stylesheet" href="{{ url('/css/admin.css') }}">
    @endif
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="logo">
            Dinesh Khatri
        </div>

        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/education') }}">Education</a></li>
            <li><a href="{{ url('/skills') }}">Skills</a></li>
            <li><a href="{{ url('/projects') }}">Projects</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>

    </nav>

    @yield('content')

</body>

</html>