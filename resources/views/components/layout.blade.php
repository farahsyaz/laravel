<!-- resources/views/layouts/app.blade.php -->
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
    <style>
        .hero-section {
            background-color: #f8f9fa;
            padding: 100px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
        }
    </style>
</head>
<body>
    <!-- Navbar with Login, Signup, User Display, and Search -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/job-work-svgrepo-com.svg') }}" alt="Job Finder Logo" height="30">
                JOB Finder
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jobs</a>
                    </li>
                    <!-- Add more navbar links as needed -->
                </ul>
                
                <!-- Include Search Partial -->
                @include('partials._search')
                
                <!-- Authentication Links -->
                <ul class="navbar-nav ml-auto">
                    @guest <!-- Show login and signup when user is not logged in -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Signup</a>
                    </li>
                    @else <!-- Show user's name and logout when user is logged in -->
                    <li class="nav-item">
                        <span class="nav-link">Welcome, {{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>


    <!-- Main Content Area -->
    <main class="container mt-4">
        {{$slot}}
    </main>

    <!-- Footer -->
    <footer class="text-muted py-4 bg-light">
        <div class="container">
            <p class="mb-1">© 2024 JOB Finder. All rights reserved.</p>
            <p class="mb-0">
                <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
