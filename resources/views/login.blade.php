<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/Registration.css') }}">
    <!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Login</title>
</head>
<body>
    <form action="{{route('user.login')}}" method="POST">
        <h2>Login</h2>
        @csrf
        <label >Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <p class="login-link">
        <a href="{{ route('password.forgetForm') }}">Forgot Password?</a>
    </p><br>

        <button type="submit">Login</button>
        <p class="login-link">
            Don't have an account? <a href="{{ url('/register') }}">Registration here</a>
        </p>
    </form>
    <!-- Toastr JS -->
<x-toastr />
</body>
</html>