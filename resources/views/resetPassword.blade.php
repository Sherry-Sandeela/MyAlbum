<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Reset Password</title>
  <link rel="stylesheet" href="{{ asset('css/Registration.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>
<body>
  <form action="{{ route('update.password', $email) }}" method="POST">
    @csrf
    <h2>Reset Password</h2>

    <label>Email:</label><br />
    <input type="email" name="email" value="{{ $email }}" readonly /><br />

    <label>New Password:</label><br />
    <input
      type="password"
      name="password"
      placeholder="Enter new password"
      required
    /><br />

    <label>Confirm Password:</label><br />
    <input
      type="password"
      name="password_confirmation"
      placeholder="Confirm new password"
      required
    /><br />

    <button type="submit">Update Password</button>

    <p class="login-link">
      <a href="{{ route('login') }}">Back to Login</a>
    </p>
  </form>

  <!-- Toastr JS -->
<x-toastr />
</body>
</html>
