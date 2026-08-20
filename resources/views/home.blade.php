@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section class="hero">

    <div class="hero-content">

        <div class="hero-text">

            <p class="intro">Hello, I'm</p>

            <h1>{{ $information->name ?? 'Dinesh Khatri' }}</h1>

            <h2>{{ $information->title ?? 'PHP & Laravel Developer' }}</h2>

            <p class="description">
                {{ $information->hero_description ?? 'I am a student passionate about programming, web development and building useful applications. I enjoy creating modern and user-friendly web applications.' }}
            </p>

            <div class="hero-buttons">

                <a href="{{ url('/projects') }}" class="btn">
                    View My Projects
                </a>

                <a href="{{ url('/contact') }}" class="btn secondary-btn">
                    Contact Me
                </a>

            </div>

            <!-- SOCIAL LINKS -->

            <div class="social-links">

                @if(!empty($information->github_url))
                <a
                    href="{{ $information->github_url }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="GitHub"
                >
                    <span>GitHub</span>
                </a>
                @endif

                @if(!empty($information->linkedin_url))
                <a
                    href="{{ $information->linkedin_url }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="LinkedIn"
                >
                    <span>LinkedIn</span>
                </a>
                @endif

                @if(!empty($information->email))
                <a
                    href="mailto:{{ $information->email }}"
                    aria-label="Email"
                >
                    <span>Email</span>
                </a>
                @endif

            </div>

        </div>

    </div>

</section>

@endsection