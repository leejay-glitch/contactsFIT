<!DOCTYPE html>
<html>
<head>
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title', 'Contacts Management System')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light blue background */
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            width: 100px;
            background-color: #007bff; /* Blue sidebar */
            color: white;
            padding: 20px;
            position: absolute;
            top: 0;
            left: 0;
            height: 100vh;
            overflow: auto;
            z-index: 1; /* Ensure sidebar is above content */
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #0056b3;
        }
        .content-wrapper {
            margin-left: 200px; /* Width of the sidebar */
            padding: 20px;
            width: calc(100% - 200px); /* Adjust for sidebar width */
            transition: margin-left 0.3s ease; /* Smooth transition for content area */
        }
        .content {
            background-color: #ffffff; /* White background for content */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Shadow for content */
        }
        .btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>CMS</h2>
        @guest
            <!-- <a href="{{ route('signup') }}">Signup</a>
            <a href="{{ route('login') }}">Login</a> -->
        @else
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('contacts.index') }}">Contacts</a>
            <a href="{{ route('groups.index') }}">Groups</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="background: none; border: none; color: white; text-align: left; padding: 0; cursor: pointer;">Logout</button>
            </form>
            
        @endguest
    </div>
    <div class="content-wrapper">
        <div class="content">
            @yield('content')
        </div>
        @auth
            <a href="{{ route('contacts.create') }}" class="btn">Create New Contact</a>
        @endauth
    </div>
</body>
</html>
