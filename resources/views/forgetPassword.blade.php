<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Forget Password</title>
  <link rel="stylesheet" href="{{ asset('css/Registration.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>
<body>
  <form action="{{ route('check.email') }}" method="POST">
    @csrf
    <h2>Forget Password</h2>

    <label>Email Address:</label><br />
    <input
      type="email"
      name="email"
      placeholder="Enter your registered email"
      required
    /><br />

    <button type="submit">Submit</button>

    <p class="login-link">
      <a href="{{ route('login') }}">Back to Login</a>
    </p>
  </form>

  <!-- Toastr JS -->
<x-toastr />
</body>
</html>
