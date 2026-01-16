<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="d-flex">

        <!-- Sidebar -->
        <div class="bg-dark text-white p-3" style="width: 250px; height: 100vh;">

            <div class="text-center mb-4 bg-white p-2 rounded">
                <img src="/images/altrone-logo.png"  alt="Admin Logo" style="height: 60px;">
            </div>

            <h4 class="mb-4">Admin Panel</h4>

            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="{{ route('admin.orders.index') }}" class="nav-link text-white">Orders</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="{{ route('admin.products.index') }}" class="nav-link text-white">Products</a>
                </li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="flex-grow-1">

            <!-- Top Navbar -->
            <nav class="navbar navbar-light bg-light px-4 d-flex justify-content-between">
                <div>
                    <span class="fw-semibold">Welcome, {{ auth()->user()->name }}</span>
                </div>

                <div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger btn-sm">Logout</button>
                    </form>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="p-4">
                @yield('content')
            </div>

        </div>

    </div>

</body>

</html>