@extends('layouts.admin')
@section('title', 'Add Skill')
@section('content')
<div class="admin-layout">
    <aside class="admin-sidebar">
        <div class="admin-brand"><div class="admin-brand-mark">D</div><div><strong>Dinesh Admin</strong><span>Portfolio Management</span></div></div>
        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-item"><span class="admin-nav-icon">⌂</span><span>Dashboard</span></a>
            <a href="{{ route('admin.projects.index') }}" class="admin-nav-item"><span class="admin-nav-icon">▣</span><span>Projects</span></a>
            <a href="{{ route('admin.skills.index') }}" class="admin-nav-item active"><span class="admin-nav-icon">★</span><span>Skills</span></a>
            @if(Route::has('admin.education.index'))<a href="{{ route('admin.education.index') }}" class="admin-nav-item"><span class="admin-nav-icon">🎓</span><span>Education</span></a>@endif
            <a href="{{ url('/') }}" target="_blank" class="admin-nav-item"><span class="admin-nav-icon">↗</span><span>View Portfolio</span></a>
        </nav><div class="sidebar-footer">Portfolio Admin</div>
    </aside>
    <main class="admin-main">
        <header class="admin-header"><div class="admin-header-content"><span class="page-label">SKILLS</span><h1>Add Skill</h1><p>Add a skill that you want to showcase on your portfolio.</p></div><a href="{{ route('admin.skills.index') }}" class="secondary-btn">← Back to Skills</a></header>
        @if($errors->any())<div class="form-alert"><strong>Please fix the following:</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('admin.skills.store') }}" method="POST" class="admin-form-card">
            @csrf
            <div class="form-grid"><div class="form-field full"><label for="name">Skill Name</label><input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="e.g. Laravel" required></div><div class="form-field full"><label for="description">Description</label><textarea id="description" name="description" rows="6" placeholder="Describe your experience with this skill..." required>{{ old('description') }}</textarea></div></div>
            <div class="form-actions"><a href="{{ route('admin.skills.index') }}" class="secondary-btn">Cancel</a><button type="submit" class="primary-btn">Add Skill</button></div>
        </form>
    </main>
</div>
@endsection
