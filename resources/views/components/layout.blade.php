<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JOB Finder</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- CSS Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        :root {
            --primary: #4F46E5;
            --primary-dark: #4338CA;
            --secondary: #64748B;
            --surface: #F8FAFC;
            --surface-dark: #F1F5F9;
        }

        body {
            background-color: var(--surface);
            font-family: -apple-system, system-ui, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        /* Navbar Styling */
        .navbar {
            background-color: white;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.25rem;
            color: var(--primary);
        }

        .nav-link {
            font-weight: 500;
            color: var(--secondary);
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-link.btn {
            padding: 0.5rem 1.25rem;
            border-radius: 0.75rem;
        }

        /* Dropdown Styling */
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border-radius: 0.75rem;
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background-color: var(--surface);
        }

        /* Footer Styling */
        footer {
            background-color: white;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        footer .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--surface);
            color: var(--secondary);
            transition: all 0.2s ease;
            margin-left: 0.5rem;
            text-decoration: none;
        }

        footer .social-link:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        /* Flash Message Styling */
        .alert {
            border-radius: 0.75rem;
            border: none;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.06);
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .navbar-collapse {
                background-color: white;
                padding: 1rem;
                border-radius: 0.75rem;
                margin-top: 1rem;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            }
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Job Finder Logo" height="32" class="me-2">
                    <span>JOB Finder</span>
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">
                                <i class="fas fa-home me-2"></i>Home
                            </a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/lists/manage">
                                    <i class="fas fa-tasks me-2"></i>Manage Listings
                                </a>
                            </li>
                            @if (Auth::user()->is_admin)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.users') }}">
                                        <i class="fas fa-users me-2"></i>Manage Users
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <ul class="navbar-nav align-items-center">
                        @guest
                            <li class="nav-item me-2">
                                <a class="nav-link btn btn-outline-primary" href="/login">
                                    <i class="fas fa-sign-in-alt me-2"></i>Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary text-white" href="/register">
                                    <i class="fas fa-user-plus me-2"></i>Register
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                    id="navbarDropdown" data-bs-toggle="dropdown">
                                    <div class="avatar-circle me-2">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="/profile">
                                            <i class="fas fa-user-circle me-2"></i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="fas fa-sign-out-alt me-2"></i>Logout
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

    <!-- Main Content -->
    <main class="container py-4 flex-grow-1">
        <x-flash-message />
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="py-4 mt-auto">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-secondary">&copy; <?php echo date('Y'); ?> JOB Finder. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="social-link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
