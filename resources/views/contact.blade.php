@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<section class="page">

    <h1>Contact Me</h1>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="error-message">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/contact') }}" class="contact-form">

        @csrf

        <label for="name">
            Name
        </label>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            placeholder="Enter your name"
            required
        >


        <label for="email">
            Email
        </label>

        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Enter your email"
            required
        >


        <label for="message">
            Message
        </label>

        <textarea
            id="message"
            name="message"
            rows="6"
            placeholder="Enter your message"
            required
        >{{ old('message') }}</textarea>


        <button type="submit">
            Send Message
        </button>

    </form>

</section>

@endsection