<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Include Bootstrap CSS (assuming you are using Bootstrap for styling) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS for centering the form -->
    <style>
        body {
            background-color: #f0f8ff; /* Light blue background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        form {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff; /* White background for form */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Shadow for form */
        }
        form label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input[type="text"],
        form input[type="email"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        form button[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        form button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" >
                    {{ __('Sign Up') }}
                </button>
            </div>
        </div>
    </form>

    <!-- Include Bootstrap JS (assuming you are using Bootstrap for styling) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
