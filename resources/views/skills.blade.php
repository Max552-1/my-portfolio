@extends('layouts.app')

@section('title', 'Skills')

@section('content')

<section class="page">

    <h1>My Skills</h1>

    <div class="skills-container">

        @foreach ($skills as $skill)

            <div class="skill">

                <h2>{{ $skill->name }}</h2>

                <p>{{ $skill->description }}</p>

            </div>

        @endforeach

    </div>

</section>

@endsection