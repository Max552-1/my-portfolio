@extends('layouts.admin')

@section('title', 'View Message')

@section('content')

<div class="admin-container">

    <div class="admin-header">
        <div>
            <h1>View Message</h1>
            <p>Message received from your portfolio.</p>
        </div>

        <a href="{{ route('admin.messages.index') }}" class="admin-btn">
            Back to Messages
        </a>
    </div>

    <div class="message-detail-card">

        <div class="message-detail-row">
            <strong>Name:</strong>
            <span>{{ $message->name }}</span>
        </div>

        <div class="message-detail-row">
            <strong>Email:</strong>
            <span>{{ $message->email }}</span>
        </div>

        <div class="message-detail-row">
            <strong>Date:</strong>
            <span>{{ $message->created_at->format('M d, Y H:i') }}</span>
        </div>

        <div class="message-content">
            <strong>Message:</strong>

            <p>
                {{ $message->message }}
            </p>
        </div>

        <div class="message-actions">

            <a
                href="mailto:{{ $message->email }}"
                class="admin-btn"
            >
                Reply by Email
            </a>

            <form
                action="{{ route('admin.messages.destroy', $message->id) }}"
                method="POST"
                onsubmit="return confirm('Are you sure you want to delete this message?');"
            >
                @csrf
                @method('DELETE')

                <button type="submit" class="delete-btn">
                    Delete
                </button>
            </form>

        </div>

    </div>

</div>

@endsection