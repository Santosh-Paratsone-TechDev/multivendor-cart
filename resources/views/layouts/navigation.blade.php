@php
$cart = session()->get('cart', []);
$cartCount = collect($cart)->sum('quantity');
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
    <a class="navbar-brand" href="{{ route('home') }}">MultiVendor</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cart.index') }}">
                    Cart
                    @if($cartCount > 0)
                    <span class="badge bg-primary">{{ $cartCount }}</span>
                    @endif
                </a>
            </li>

            @auth
            @if(auth()->user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
            </li>
            @endif
            @endauth
        </ul>

        <ul class="navbar-nav ms-auto">
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @else
            <li class="nav-item">
                <span class="nav-link">{{ auth()->user()->name }}</span>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-link nav-link">Logout</button>
                </form>
            </li>
            @endguest
        </ul>
    </div>
</nav>