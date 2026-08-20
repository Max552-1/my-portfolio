@extends('layouts.admin')
@section('title', 'Edit Project')
@section('content')
<div class="admin-layout">
    <aside class="admin-sidebar">
        <div class="admin-brand"><div class="admin-brand-mark">D</div><div><strong>Dinesh Admin</strong><span>Portfolio Management</span></div></div>
        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-item"><span class="admin-nav-icon">⌂</span><span>Dashboard</span></a>
            <a href="{{ route('admin.projects.index') }}" class="admin-nav-item active"><span class="admin-nav-icon">▣</span><span>Projects</span></a>
            <a href="{{ route('admin.skills.index') }}" class="admin-nav-item"><span class="admin-nav-icon">★</span><span>Skills</span></a>
            @if(Route::has('admin.education.index'))<a href="{{ route('admin.education.index') }}" class="admin-nav-item"><span class="admin-nav-icon">🎓</span><span>Education</span></a>@endif
            <a href="{{ url('/') }}" target="_blank" class="admin-nav-item"><span class="admin-nav-icon">↗</span><span>View Portfolio</span></a>
        </nav><div class="sidebar-footer">Portfolio Admin</div>
    </aside>
    <main class="admin-main">
        <header class="admin-header"><div class="admin-header-content"><span class="page-label">PROJECTS</span><h1>Edit Project</h1><p>Update your project information and presentation.</p></div><a href="{{ route('admin.projects.index') }}" class="secondary-btn">← Back to Projects</a></header>
        @if($errors->any())<div class="form-alert"><strong>Please fix the following:</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="admin-form-card">
            @csrf @method('PUT')
            <div class="form-grid">
                <div class="form-field full"><label for="title">Project Title</label><input id="title" name="title" type="text" value="{{ old('title', $project->title) }}" required></div>
                <div class="form-field full"><label for="description">Description</label><textarea id="description" name="description" rows="6" required>{{ old('description', $project->description) }}</textarea></div>
                <div class="form-field"><label for="github_url">GitHub URL</label><input id="github_url" name="github_url" type="url" value="{{ old('github_url', $project->github_url) }}"></div>
                <div class="form-field"><label for="technologies">Technologies</label><input id="technologies" name="technologies" type="text" value="{{ old('technologies', $project->technologies) }}"></div>
                <div class="form-field full"><label>Current Project Image</label><div class="current-image">@if($project->image)<img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">@else<span>No image uploaded.</span>@endif</div></div>
                <div class="form-field full"><label for="image">Replace Project Image</label><input id="image" name="image" type="file" accept="image/*"><small>Leave empty to keep the current image.</small></div>
            </div>
            <div class="form-actions"><a href="{{ route('admin.projects.index') }}" class="secondary-btn">Cancel</a><button type="submit" class="primary-btn">Update Project</button></div>
        </form>
    </main>
</div>
@endsection
