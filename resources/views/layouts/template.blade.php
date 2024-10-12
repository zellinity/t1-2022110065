<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Product')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9NDikXlfyF+NNg5dTgr8cGFtK9i+7IpFfQ2s4fH5uOVfxUMGHobNq3VDX8k33rhX" crossorigin="anonymous">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f8fb;
            color: #343a40;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #6a1b9a !important; /* Unique purple color */
            padding: 1rem 0; /* Reduced padding */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .navbar-brand {
            font-size: 1.8rem; /* Larger brand font size */
            font-weight: 600;
            color: white !important;
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: #ffc107 !important; /* Unique hover color */
        }

        .nav-link {
            font-size: 1.2rem; /* Same font size for all links */
            color: white !important;
            transition: color 0.3s ease;
            padding: 0.8rem 1.2rem; /* Increased padding */
 }

        .nav-link:hover {
            color: #ffc107 !important; /* Unique hover color */
        }

        .nav-link.active {
            font-weight: 600;
            color: #ffc107 !important;
        }

        /* Dropdown Menu Styles */
        .dropdown-menu {
            background-color: #6a1b9a; /* Matching dropdown background */
            max-width: 100vw; /* Limit dropdown width to viewport width */
            left: 0; /* Align dropdown with the left edge */
            right: auto; /* Disable right alignment */
            width: auto; /* Allow width to adjust based on content */
            overflow-x: hidden; /* Add this to prevent horizontal overflow */
            border-radius: 0.5rem; /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .dropdown-item {
            color: white;
            transition: background-color 0.3s ease;
            padding: 0.8rem 1.2rem; /* Increased padding */
        }

        .dropdown-item:hover {
            background-color: #ffca28;
            color: #343a40;
        }

        /* Button Styles */
        .btn-primary {
            background-color: #ffca28;
            border: none;
            color: white;
            font-weight: 600;
            transition: background-color 0.3s ease;
            padding: 0.8rem 1.2rem; /* Increased padding */
            border-radius: 0.5rem; /* Rounded corners */
        }

        .btn-primary:hover {
            background-color: #ff9800;
        }

        /* Footer Styles */
        footer {
            background-color: #6a1b9a;
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto; /* Push footer to the bottom */
            border-top: 1px solid #343a40; /* Add a subtle border */
        }
    </style>

    @vite(['resources/sass/app.scss'])
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard Product</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}" href="{{ route('products.index') }}">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.create') ? 'active' : '' }}" href="{{ route('products.create') }}">Tambah Product</a>
                    </li>
                    <!-- Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Mineral Water</a></li>
                            <li><a class="dropdown-item" href="#">Ice Cream</a></li>
                            <li><a class="dropdown-item" href="#">Snack</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container">
        @yield('body')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Product - All Rights Reserved</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ksmD9mqmhMmmzOz6cpK1yzoKpvx4NR0FtI4nR7KcLeYlBiXJjkz4zrbjZFLGFpMt" crossorigin="anonymous"></script>
    @vite(['resources/js/app.js'])
</body>
</html>
