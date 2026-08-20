@extends('layouts.admin')

@section('title', 'Education')

@section('content')

<div class="admin-container">

    <div class="admin-header">

        <div>
            <h1>Education</h1>

            <p>
                Manage your education information.
            </p>
        </div>

        <a href="{{ route('admin.education.create') }}" class="admin-btn">
            + Add Education
        </a>

    </div>


    @if(session('success'))

        <div class="success-message">
            {{ session('success') }}
        </div>

    @endif


    <div class="education-admin-container">

        @forelse($educations as $education)

            <div class="education-admin-card">

                <div class="education-admin-content">

                    <h2>
                        {{ $education->degree }}
                    </h2>

                    <h3>
                        {{ $education->institution }}
                    </h3>

                    <p>
                        <strong>Course:</strong>
                        {{ $education->course }}
                    </p>

                    <p>
                        <strong>Period:</strong>
                        {{ $education->period }}
                    </p>

                    @if($education->description)

                        <p>
                            {{ $education->description }}
                        </p>

                    @endif


                    <div class="education-actions">

                        <a
                            href="{{ route('admin.education.edit', $education->id) }}"
                            class="edit-btn"
                        >
                            Edit
                        </a>


                        <form
                            action="{{ route('admin.education.destroy', $education->id) }}"
                            method="POST"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-btn"
                                onclick="return confirm('Are you sure you want to delete this education record?')"
                            >
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="empty-education">

                <h2>No Education Added</h2>

                <p>
                    Add your education information to display it here.
                </p>

                <a
                    href="{{ route('admin.education.create') }}"
                    class="admin-btn"
                >
                    + Add Education
                </a>

            </div>

        @endforelse

    </div>

</div>

@endsection