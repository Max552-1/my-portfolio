@extends('layouts.admin')

@section('title', 'Manage Projects')

@section('content')

<div class="admin-layout">

    {{-- ========================================
         SIDEBAR
    ========================================= --}}

    <aside class="admin-sidebar">

        <div class="admin-logo">

            <div class="admin-logo-icon">
                D
            </div>

            <div>
                <h2>Dinesh Admin</h2>
                <p>Portfolio Management</p>
            </div>

        </div>


        <nav class="admin-nav">

            <a
                href="{{ route('admin.dashboard') }}"
                class="admin-nav-item"
            >
                <span class="admin-nav-icon">⌂</span>
                <span>Dashboard</span>
            </a>


            <a
                href="{{ route('admin.projects.index') }}"
                class="admin-nav-item active"
            >
                <span class="admin-nav-icon">▣</span>
                <span>Projects</span>
            </a>


            <a
                href="{{ route('admin.skills.index') }}"
                class="admin-nav-item"
            >
                <span class="admin-nav-icon">★</span>
                <span>Skills</span>
            </a>


            @if(Route::has('admin.education.index'))

                <a
                    href="{{ route('admin.education.index') }}"
                    class="admin-nav-item"
                >
                    <span class="admin-nav-icon">🎓</span>
                    <span>Education</span>
                </a>

            @endif


            @if(Route::has('admin.messages.index'))

                <a
                    href="{{ route('admin.messages.index') }}"
                    class="admin-nav-item"
                >
                    <span class="admin-nav-icon">✉</span>
                    <span>Messages</span>
                </a>

            @endif


            <a
                href="{{ url('/') }}"
                target="_blank"
                class="admin-nav-item"
            >
                <span class="admin-nav-icon">↗</span>
                <span>View Portfolio</span>
            </a>

        </nav>


        <div class="sidebar-footer">

            <p>Portfolio Admin</p>

        </div>

    </aside>



    {{-- ========================================
         MAIN CONTENT
    ========================================= --}}

    <main class="admin-main">


        {{-- HEADER --}}

        <header class="admin-header">

            <div class="admin-header-content">

                <span class="page-label">
                    PORTFOLIO
                </span>

                <h1>
                    Projects
                </h1>

                <p>
                    Manage and organize your portfolio projects.
                </p>

            </div>


            <a
                href="{{ route('admin.projects.create') }}"
                class="add-project-btn"
            >
                <span class="add-icon">+</span>
                Add Project
            </a>

        </header>



        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="success-message">

                <span class="success-icon">✓</span>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif



        {{-- PROJECT COUNT --}}

        <div class="projects-toolbar">

            <div>

                <h2>
                    Your Projects
                </h2>

                <p>
                    {{ $projects->count() }}
                    {{ $projects->count() === 1 ? 'project' : 'projects' }}
                    in your portfolio
                </p>

            </div>

        </div>



        {{-- ========================================
             PROJECT GRID
        ========================================= --}}

        <div class="projects-admin-container">

            @forelse($projects as $project)

                <article class="project-admin-card">


                    {{-- PROJECT IMAGE --}}

                    <div class="project-image-wrapper">

                        @if($project->image)

                            <img
                                src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}"
                                class="project-admin-image"
                            >

                        @else

                            <div class="project-admin-image no-image">

                                <div class="no-image-icon">
                                    ◈
                                </div>

                                <span>
                                    No Image
                                </span>

                            </div>

                        @endif

                    </div>



                    {{-- PROJECT CONTENT --}}

                    <div class="project-admin-content">


                        {{-- TITLE --}}

                        <h2 class="project-title">
                            {{ $project->title }}
                        </h2>



                        {{-- DESCRIPTION --}}

                        <p class="project-description">
                            {{ $project->description }}
                        </p>



                        {{-- TECHNOLOGIES --}}

                        @if($project->technologies)

                            <div class="project-technologies">

                                <div class="technology-label">
                                    Technologies
                                </div>


                                <div class="technology-list">

                                    @foreach(explode(',', $project->technologies) as $technology)

                                        @if(trim($technology))

                                            <span class="technology-badge">
                                                {{ trim($technology) }}
                                            </span>

                                        @endif

                                    @endforeach

                                </div>

                            </div>

                        @endif



                        {{-- ACTIONS --}}

                        <div class="project-actions">


                            @if($project->github_url)

                                <a
                                    href="{{ $project->github_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="project-action github-btn"
                                >
                                    <span>↗</span>
                                    GitHub
                                </a>

                            @endif


                            <a
                                href="{{ route('admin.projects.edit', $project->id) }}"
                                class="project-action edit-btn"
                            >
                                <span>✎</span>
                                Edit
                            </a>


                            <form
                                action="{{ route('admin.projects.destroy', $project->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this project?');"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="project-action delete-btn"
                                >
                                    <span>⌫</span>
                                    Delete
                                </button>

                            </form>

                        </div>


                    </div>

                </article>


            @empty


                {{-- EMPTY STATE --}}

                <div class="empty-projects">

                    <div class="empty-project-icon">
                        ◈
                    </div>

                    <h2>
                        No Projects Yet
                    </h2>

                    <p>
                        You haven't added any projects to your portfolio.
                    </p>

                    <a
                        href="{{ route('admin.projects.create') }}"
                        class="add-project-btn"
                    >
                        <span class="add-icon">+</span>
                        Add Your First Project
                    </a>

                </div>


            @endforelse

        </div>


    </main>

</div>

@endsection