@extends('layouts.admin')

@section('title', 'Manage Skills')

@section('content')

<div class="admin-layout">

    <!-- SIDEBAR -->
    <aside class="admin-sidebar">

        <div class="admin-brand">
            <div class="admin-brand-mark">D</div>
            <div><strong>Dinesh Admin</strong><span>Portfolio Management</span></div>
        </div>

        <nav class="admin-nav">

            <a href="{{ route('admin.dashboard') }}" class="admin-nav-item">
                <span class="admin-nav-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.projects.index') }}" class="admin-nav-item">
                <span class="admin-nav-icon">▣</span>
                <span>Projects</span>
            </a>

            <a href="{{ route('admin.skills.index') }}" class="admin-nav-item active">
                <span class="admin-nav-icon">★</span>
                <span>Skills</span>
            </a>

            <a href="{{ url('/') }}" target="_blank" class="admin-nav-item">
                <span class="admin-nav-icon">↗</span>
                <span>View Portfolio</span>
            </a>

        </nav>

        <div class="sidebar-footer">Portfolio Admin</div>
    </aside>


    <!-- MAIN CONTENT -->
    <main class="admin-main">

        <div class="admin-header">

            <div class="admin-header-content">
                <span class="page-label">PORTFOLIO</span>
                <h1>Skills</h1>
                <p>Manage the skills displayed on your portfolio.</p>
            </div>

            <a href="{{ route('admin.skills.create') }}" class="primary-btn">
                + Add Skill
            </a>

        </div>


        <!-- SKILLS -->

        <div class="management-container skills-grid">

            @forelse ($skills as $skill)

                <div class="management-card">

                    <h2>{{ $skill->name }}</h2>

                    <p>
                        {{ $skill->description }}
                    </p>

                    <div>

                        <a
                            href="{{ route('admin.skills.edit', $skill->id) }}"
                            class="primary-btn"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.skills.destroy', $skill->id) }}"
                            method="POST"
                            style="display: inline;"
                            onsubmit="return confirm('Are you sure you want to delete this skill?');"
                        >

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="danger-btn">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="management-card">

                    <h2>No Skills Found</h2>

                    <p>
                        You haven't added any skills yet.
                    </p>

                    <a
                        href="{{ route('admin.skills.create') }}"
                        class="primary-btn"
                    >
                        Add Your First Skill
                    </a>

                </div>

            @endforelse

        </div>

    </main>

</div>

@endsection
