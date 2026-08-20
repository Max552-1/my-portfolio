@extends('layouts.admin')

@section('title', 'Edit Education')

@section('content')

<div class="admin-container">

    <div class="admin-header">

        <div>
            <h1>Edit Education</h1>

            <p>
                Update your education information.
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
            action="{{ route('admin.education.update', $education->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="form-group">

                <label for="degree">
                    Degree
                </label>

                <input
                    type="text"
                    id="degree"
                    name="degree"
                    value="{{ old('degree', $education->degree) }}"
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
                    value="{{ old('institution', $education->institution) }}"
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
                    value="{{ old('course', $education->course) }}"
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
                    value="{{ old('period', $education->period) }}"
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
                >{{ old('description', $education->description) }}</textarea>

            </div>


            <button
                type="submit"
                class="admin-btn"
            >
                Update Education
            </button>

        </form>

    </div>

</div>

@endsection