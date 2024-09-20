<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        /* Sidebar styles */
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            height: 100vh;
            padding: 10px;
            border-right: 1px solid #dee2e7;
            position: fixed; /* Fix sidebar to the left */
        }

        .nav-link {
            color: #333;
            font-weight: 500;
            padding: 10px 15px;
            display: block;
            text-decoration: bold;
        }

        .nav-link:hover {
            background-color: #e9ecef;
            border-radius: 4px;
        }

        .nav-link.active {
            background-color: #000000;
            color: white;
            border-radius: 4px;
        }

        /* Form styles */
        .form-container {
            margin-left: 270px; /* Adjust for the sidebar */
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            max-width: 600px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #80bdff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-submit {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-submit:hover {
            background-color: #0056b3;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ route('users') }}">Users</a> --}}
                    <a class="nav-link" href="{{ route('users') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('properties.index') }}">Properties</a>
                </li>
            </ul>
        </div>


    <div class="container mt-4">
        <div class="row">
            <div class="col-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('properties.index') }}">Property List</a></li>
                    <li class="list-group-item"><a href="{{ route('properties.create') }}">Add New Property</a></li>
                </ul>
            </div>
            <div class="col-9">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
