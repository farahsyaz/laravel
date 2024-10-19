<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title and Favicon -->
    <title>JOB Finder</title>
    <link rel="icon" type="image/png" href="{{ asset('images/job-work-svgrepo-com.svg') }}">

    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link CSS file -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Alpine JS CDN -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
</head>

<body>
    <!-- Navbar with Login, Signup, User Display, and Search -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/job-work-svgrepo-com.svg') }}" alt="Job Finder Logo" height="30">
                JOB Finder
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-home mr-1"></i>Home</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/lists/manage"><i class="fas fa-tasks mr-1"></i>Manage Listings</a>
                        </li>
                        @if (Auth::user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                                        class="fas fa-tachometer-alt mr-1"></i>Admin Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users') }}"><i
                                        class="fas fa-users mr-1"></i>Manage Users</a>
                            </li>
                        @endif
                    @endauth
                </ul>

                <!-- Authentication Links -->
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt mr-1"></i>Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register"><i class="fas fa-user-plus mr-1"></i>Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <span class="nav-link"><i class="fas fa-user mr-1"></i>Welcome, {{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link"
                                    style="display: inline; cursor: pointer;"><i
                                        class="fas fa-sign-out-alt mr-1"></i>Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Content Area -->
    <main class="container mt-4">
        <!-- Flash message -->
        <x-flash-message />
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="text-muted py-4 bg-light">
        <div class="container">
            <p class="mb-1">© <?php echo date("Y"); ?> JOB Finder. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
