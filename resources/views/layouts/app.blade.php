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
            width: 200px; /* Width of the sidebar */
            background-color: #007bff; /* Blue sidebar */
            color: white;
            padding: 20px;
            position: fixed; /* Fixed position */
            top: 0;
            left: 0;
            height: 100vh;
            overflow: auto;
            z-index: 1; /* Ensure sidebar is above content */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
        }
        .sidebar a:hover {
            background-color: #0056b3;
        }
        .login-logout {
            margin-top: auto; /* Push the login/logout form to the bottom */
        }
        .login-logout form {
            display: flex;
            justify-content: center;
        }
        .login-logout button {
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: left;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
        }
        .login-logout button:hover {
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
            position: fixed; /* Fixed position */
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
        
        <div class="login-logout">
            
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
        @endguest
        </div>
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
