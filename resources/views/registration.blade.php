<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/Registration.css')}}">
    <!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <title>Registration</title>
</head>
<body>
    
    <form action="{{route('register')}}" method="POST">
        <h2>User Registration</h2>
        @csrf
        <input type="text" name="name" placeholder="Enter name" required><br>
        <input type="email" name="email" placeholder="Enter email" required><br>
        <input type="password" name="password" placeholder="Enter password" required><br>
        <input type="password" name="password_confirmation" placeholder="Confirm password" required><br>
   
        <button type="submit">Registration</button>

        <p class="login-link">
            Already have an account? <a href="{{ url('/login') }}">Login here</a>
        </p>
    </form>
    <!-- Toastr JS -->

<x-toastr />
</body>
</html> 