@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<section class="page">

    <h1>My Projects</h1>

    <div class="projects-container">

        @forelse ($projects as $project)

            <div class="project-card">

                {{-- Project Image --}}
                @if ($project->image)
                    <img
                        src="{{ asset('storage/' . $project->image) }}"
                        alt="{{ $project->title }}"
                        class="project-image"
                    >
                @endif

                {{-- Project Title --}}
                <h2>{{ $project->title }}</h2>

                {{-- Project Description --}}
                <p>
                    {{ $project->description }}
                </p>

                {{-- GitHub Link --}}
                @if ($project->github_url)

                    <a
                        href="{{ $project->github_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        View on GitHub
                    </a>

                @endif

                {{-- Technologies --}}
                @if ($project->technologies)

                    <p>
                        <strong>Technologies:</strong>
                        {{ $project->technologies }}
                    </p>

                @endif

            </div>

        @empty

            <p>No projects available yet.</p>

        @endforelse

    </div>

</section>

@endsection