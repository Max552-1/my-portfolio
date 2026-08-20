<nav>
    <div>
        <a href="{{ route('admin.dashboard') }}">
            Admin Dashboard
        </a>
    </div>

    <div>
        <span>{{ auth()->user()->name }}</span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit">
                Logout
            </button>
        </form>
    </div>
</nav>