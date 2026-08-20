@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="admin-layout">
    <aside class="admin-sidebar">
        <div class="admin-brand">
            <div class="admin-brand-mark">D</div>
            <div>
                <strong>Dinesh Admin</strong>
                <span>Portfolio Management</span>
            </div>
        </div>

        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-item active"><span class="admin-nav-icon">⌂</span><span>Dashboard</span></a>
            <a href="{{ route('admin.projects.index') }}" class="admin-nav-item"><span class="admin-nav-icon">▣</span><span>Projects</span></a>
            <a href="{{ route('admin.skills.index') }}" class="admin-nav-item"><span class="admin-nav-icon">★</span><span>Skills</span></a>
            @if(Route::has('admin.education.index'))
                <a href="{{ route('admin.education.index') }}" class="admin-nav-item"><span class="admin-nav-icon">🎓</span><span>Education</span></a>
            @endif
            @if(Route::has('admin.messages.index'))
                <a href="{{ route('admin.messages.index') }}" class="admin-nav-item"><span class="admin-nav-icon">✉</span><span>Messages</span></a>
            @endif
            <a href="{{ url('/') }}" target="_blank" class="admin-nav-item"><span class="admin-nav-icon">↗</span><span>View Portfolio</span></a>
        </nav>

        <div class="sidebar-footer">Portfolio Admin</div>
    </aside>

    <main class="admin-main">
        <header class="admin-header">
            <div class="admin-header-content">
                <span class="page-label">OVERVIEW</span>
                <h1>Admin Dashboard</h1>
                <p>Manage your portfolio content from one place.</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="secondary-btn">Logout</button>
            </form>
        </header>

        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon blue">▣</div>
                <div><span>Total Projects</span><strong>{{ $projectCount }}</strong></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon purple">★</div>
                <div><span>Total Skills</span><strong>{{ $skillCount }}</strong></div>
            </div>
        </section>

        <section class="section-heading">
            <div><h2>Manage Portfolio</h2><p>Quick access to the sections of your portfolio.</p></div>
        </section>

        <section class="management-container">
            <a href="{{ route('admin.projects.index') }}" class="management-card">
                <div class="management-icon blue">▣</div><h2>Projects</h2><p>Add, edit and delete your portfolio projects.</p><span class="management-link">Manage Projects →</span>
            </a>
            <a href="{{ route('admin.skills.index') }}" class="management-card">
                <div class="management-icon purple">★</div><h2>Skills</h2><p>Manage the skills displayed on your portfolio.</p><span class="management-link">Manage Skills →</span>
            </a>
            @if(Route::has('admin.education.index'))
            <a href="{{ route('admin.education.index') }}" class="management-card">
                <div class="management-icon green">🎓</div><h2>Education</h2><p>Add, edit and manage your education history.</p><span class="management-link">Manage Education →</span>
            </a>
            @endif
            @if(Route::has('admin.information.edit'))
            <a href="{{ route('admin.information.edit') }}" class="management-card">
                <div class="management-icon orange">✦</div><h2>Information</h2><p>Edit the personal information shown on your portfolio.</p><span class="management-link">Edit Profile Info →</span>
            </a>
            @endif
        </section>
    </main>
</div>
@endsection
