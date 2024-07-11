@extends('layouts.app')
@section('title', 'Home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Contacts Management System</title>
    <!-- Include Bootstrap CSS (assuming you are using Bootstrap for styling) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include custom CSS -->
    <style>
        .form-toggle {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome to Contacts Management System') }}</div>

                    <div class="card-body">
                        <div id="login-form" style="display: {{ session('form') == 'signup' ? 'none' : 'block' }};">
                            @include('login') <!-- Include the login form -->
                            <p class="mt-3">Don't have an account? <span class="form-toggle" onclick="toggleForm('signup')">Sign Up</span></p>
                        </div>

                        <div id="signup-form" style="display: {{ session('form') == 'signup' ? 'block' : 'none' }};">
                            @include('signup') <!-- Include the signup form -->
                            <p class="mt-3">Already have an account? <span class="form-toggle" onclick="toggleForm('login')">Login</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleForm(form) {
            if (form === 'login') {
                document.getElementById('login-form').style.display = 'block';
                document.getElementById('signup-form').style.display = 'none';
            } else if (form === 'signup') {
                document.getElementById('login-form').style.display = 'none';
                document.getElementById('signup-form').style.display = 'block';
            }
        }
    </script>
</body>
</html>
@endsection
