<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title and Favicon -->
    <title>JOB Finder</title>
    <link rel="icon" type="image/png" href="{{ asset('images/job-work-svgrepo-com.svg') }}">

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Alpine JS CDN -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Link to the custom CSS file -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img src="{{ asset('images/job-work-svgrepo-com.svg') }}" alt="Job Finder Logo" height="30"
                        class="me-2">
                    <span>JOB Finder</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/"><i class="fas fa-home me-1"></i>Home</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/lists/manage"><i class="fas fa-tasks me-1"></i>Manage
                                    Listings</a>
                            </li>
                            @if (Auth::user()->is_admin)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                                            class="fas fa-tachometer-alt me-1"></i>Admin Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.users') }}"><i
                                            class="fas fa-users me-1"></i>Manage Users</a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Authentication Links -->
                    <ul class="navbar-nav">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link btn btn-outline-primary me-2" href="/login"><i
                                        class="fas fa-sign-in-alt me-1"></i>Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary" href="/register"><i
                                        class="fas fa-user-plus me-1"></i>Register</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-1"></i>Welcome, {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="/profile">
                                            <i class="fas fa-user-circle me-1"></i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="/logout" method="POST" class="dropdown-item p-0">
                                            @csrf
                                            <button type="submit" class="btn btn-link nav-link text-start w-100">
                                                <i class="fas fa-sign-out-alt me-1"></i>Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content Area -->
    <main class="container my-4 flex-grow-1">
        <!-- Flash message -->
        <x-flash-message />
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="py-4 mt-auto">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <?php echo date('Y'); ?> JOB Finder. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <a href="#" class="text-muted me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-muted me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-muted me-3"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="text-muted"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
