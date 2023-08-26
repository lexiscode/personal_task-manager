<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>

    <!-- Include any global CSS files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/tasks.css") }}">
    <link rel="stylesheet" href="{{ asset("css/body.css") }}">
    <link rel="stylesheet" href="{{ asset("css/message.css") }}">
    <link rel="stylesheet" href="{{ asset("css/search.css") }}">
    @yield('register-login-styles')
    @yield('home-styles')

</head>
<body>

    <!-- contents here -->
    @yield('homepage')
    @yield('register')
    @yield('login')
    @yield('tasks')
    @yield('task_show')
    @yield('search')
    @yield('category')
    @yield('category_show')


    <!-- Include any global JS files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src='{{ asset("js/home_rain.js") }}' async></script>

</body>
</html>

