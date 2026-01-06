<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-green" href="/">
            ♻ EcoWaste
        </a>

        <ul class="navbar-nav mx-auto gap-4">
            <li class="nav-item">
                <a class="nav-link" href="/">HOME</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="/jual">JUAL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/toko">TOKO</a>
            </li>
            @endauth
        </ul>

        @auth
            <span class="me-3 fw-semibold">
                Halo, {{ auth()->user()->name }} 👋
            </span>
        @endauth
       
        @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger">
                Logout
            </button>
        </form>
        @endauth

        @guest
        <a href="/login" class="btn btn-outline-success">Login</a>
        @endguest
    </div>
</nav>
