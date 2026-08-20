@extends('layouts.admin')

@section('title', 'Messages')

@section('content')

<div class="admin-container">

    <div class="admin-header">
        <div>
            <h1>Messages</h1>
            <p>Messages received from your portfolio contact form.</p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="admin-btn">
            Back to Dashboard
        </a>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if($messages->count())

        <div class="messages-container">

            @foreach($messages as $message)

                <div class="message-card">

                    <div class="message-header">
                        <div>
                            <h2>{{ $message->name }}</h2>
                            <p>{{ $message->email }}</p>
                        </div>

                        <small>
                            {{ $message->created_at->format('M d, Y H:i') }}
                        </small>
                    </div>

                    <p class="message-preview">
                        {{ Str::limit($message->message, 150) }}
                    </p>

                    <div class="message-actions">

                        <a
                            href="{{ route('admin.messages.show', $message->id) }}"
                            class="admin-btn"
                        >
                            View
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

            @endforeach

        </div>

    @else

        <div class="empty-message">
            <h2>No Messages</h2>
            <p>You haven't received any messages yet.</p>
        </div>

    @endif

</div>

@endsection