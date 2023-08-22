<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset("css/home.css") }}">
  <title>Personal Task Manager</title>
</head>
<body>
  <div class="welcome-container">
    <h1>Welcome to Your Personal Task Manager</h1>
    <p>Your all-in-one solution for managing tasks effectively.</p>
    <div class="buttons">
        <a href="{{ route('client.signup') }}" class="button">Register</a>
        <a href="{{ route('client.signin') }}" class="button">Login</a>
    </div>
  </div>
</body>
</html>
