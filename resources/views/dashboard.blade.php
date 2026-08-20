@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

<div class="admin-layout">

    <!-- SIDEBAR -->
    <aside class="admin-sidebar">

        <div class="admin-logo">
            <h2>Dinesh Admin</h2>
            <p>Portfolio Management</p>
        </div>

        <nav class="admin-nav">

            <a href="{{ route('admin.dashboard') }}" class="active">
                <span class="admin-nav-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.projects.index') }}">
                <span class="admin-nav-icon">▣</span>
                <span>Projects</span>
            </a>

            <a href="#">
                <span class="admin-nav-icon">★</span>
                <span>Skills</span>
            </a>

            <a href="{{ url('/') }}" target="_blank">
                <span class="admin-nav-icon">↗</span>
                <span>View Portfolio</span>
            </a>

        </nav>

    </aside>


    <!-- MAIN CONTENT -->
    <main class="admin-main">

        <div class="admin-header">

            <div>
                <h1>Admin Dashboard</h1>

                <p>
                    Welcome, {{ auth()->user()->name }}!
                </p>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>

        </div>


        <!-- STATISTICS -->

        <div class="stats-container">

            <div class="stat-card">

                <div class="stat-icon">
                    ▣
                </div>

                <div>
                    <h2>{{ $projectCount }}</h2>
                    <p>Total Projects</p>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    ★
                </div>

                <div>
                    <h2>{{ $skillCount }}</h2>
                    <p>Total Skills</p>
                </div>

            </div>

        </div>


        <!-- MANAGEMENT -->

        <div class="management-container">

            <div class="management-card">

                <div>
                    <h2>Projects</h2>

                    <p>
                        Add, edit and delete your portfolio projects.
                    </p>
                </div>

                <a
                    href="{{ route('admin.projects.index') }}"
                    class="admin-btn"
                >
                    Manage Projects →
                </a>

            </div>


            <div class="management-card">

                <div>
                    <h2>Skills</h2>

                    <p>
                        Manage the skills displayed on your portfolio.
                    </p>
                </div>

                <a href="#" class="admin-btn">
                    Manage Skills →
                </a>

            </div>

        </div>

    </main>

</div>

@endsection