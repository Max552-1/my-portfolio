@extends('layouts.app')

@section('title', 'Education')

@section('content')

<section class="page">

    <h1>Education</h1>

    @forelse($educations as $education)

        <div class="education-card">

            <h2>{{ $education->degree }}</h2>

            <h3>{{ $education->institution }}</h3>

            <p>
                Course: {{ $education->course }}
            </p>

            <p>
                {{ $education->period }}
            </p>

            @if($education->description)
                <p>
                    {{ $education->description }}
                </p>
            @endif

        </div>

    @empty

        <p>No education records yet.</p>

    @endforelse

</section>

@endsection