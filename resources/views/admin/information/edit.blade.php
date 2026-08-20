@extends('layouts.app')

@section('title', 'Edit Information')

@section('content')
<section class="page">
    <h1>Edit Profile Information</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.information.update') }}" method="POST" class="contact-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $information->name) }}" required>
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $information->title) }}" required>
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="hero_description">Hero Description (Home Page)</label>
            <textarea name="hero_description" id="hero_description" rows="4">{{ old('hero_description', $information->hero_description) }}</textarea>
            @error('hero_description') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="about_description">About Me Description</label>
            <textarea name="about_description" id="about_description" rows="6">{{ old('about_description', $information->about_description) }}</textarea>
            @error('about_description') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="github_url">GitHub URL</label>
            <input type="url" name="github_url" id="github_url" value="{{ old('github_url', $information->github_url) }}">
            @error('github_url') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="linkedin_url">LinkedIn URL</label>
            <input type="url" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url', $information->linkedin_url) }}">
            @error('linkedin_url') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="email">Contact Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $information->email) }}">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn">Update Information</button>
    </form>
</section>
@endsection
