@extends('layouts.admin')
@section('title', 'Add Project')
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
        <header class="admin-header"><div class="admin-header-content"><span class="page-label">PROJECTS</span><h1>Add Project</h1><p>Create a new project for your portfolio.</p></div><a href="{{ route('admin.projects.index') }}" class="secondary-btn">← Back to Projects</a></header>
        @if($errors->any())<div class="form-alert"><strong>Please fix the following:</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="admin-form-card">
            @csrf
            <div class="form-grid">
                <div class="form-field full"><label for="title">Project Title</label><input id="title" name="title" type="text" value="{{ old('title') }}" placeholder="e.g. Portfolio Website" required></div>
                <div class="form-field full"><label for="description">Description</label><textarea id="description" name="description" rows="6" placeholder="Describe the project..." required>{{ old('description') }}</textarea></div>
                <div class="form-field"><label for="github_url">GitHub URL</label><input id="github_url" name="github_url" type="url" value="{{ old('github_url') }}" placeholder="https://github.com/..."></div>
                <div class="form-field"><label for="technologies">Technologies</label><input id="technologies" name="technologies" type="text" value="{{ old('technologies') }}" placeholder="Laravel, PHP, MySQL, CSS"></div>
                <div class="form-field full"><label for="image">Project Image</label><input id="image" name="image" type="file" accept="image/*"><small>Use a clear landscape image for the best card appearance.</small></div>
            </div>
            <div class="form-actions"><a href="{{ route('admin.projects.index') }}" class="secondary-btn">Cancel</a><button type="submit" class="primary-btn">Save Project</button></div>
        </form>
    </main>
</div>
@endsection
