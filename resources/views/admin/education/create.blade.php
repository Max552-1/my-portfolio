@extends('layouts.admin')

@section('title', 'Add Education')

@section('content')

<div class="admin-container">

    <div class="admin-header">

        <div>
            <h1>Add Education</h1>

            <p>
                Add a new education record.
            </p>
        </div>

        <a
            href="{{ route('admin.education.index') }}"
            class="admin-btn"
        >
            Back to Education
        </a>

    </div>


    @if($errors->any())

        <div class="error-message">

            @foreach($errors->all() as $error)

                <p>{{ $error }}</p>

            @endforeach

        </div>

    @endif


    <div class="admin-form-card">

        <form
            action="{{ route('admin.education.store') }}"
            method="POST"
        >

            @csrf


            <div class="form-group">

                <label for="degree">
                    Degree
                </label>

                <input
                    type="text"
                    id="degree"
                    name="degree"
                    value="{{ old('degree') }}"
                    placeholder="Bachelor's Degree"
                    required
                >

            </div>


            <div class="form-group">

                <label for="institution">
                    Institution
                </label>

                <input
                    type="text"
                    id="institution"
                    name="institution"
                    value="{{ old('institution') }}"
                    placeholder="APU University"
                    required
                >

            </div>


            <div class="form-group">

                <label for="course">
                    Course
                </label>

                <input
                    type="text"
                    id="course"
                    name="course"
                    value="{{ old('course') }}"
                    placeholder="BSc (Hons) in Computer Science"
                    required
                >

            </div>


            <div class="form-group">

                <label for="period">
                    Period
                </label>

                <input
                    type="text"
                    id="period"
                    name="period"
                    value="{{ old('period') }}"
                    placeholder="2025 - Present"
                    required
                >

            </div>


            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="Write a short description about your education..."
                >{{ old('description') }}</textarea>

            </div>


            <button
                type="submit"
                class="admin-btn"
            >
                Add Education
            </button>

        </form>

    </div>

</div>

@endsection