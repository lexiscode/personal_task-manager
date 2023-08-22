@extends("layout.master")

@section('register')

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark">
            <h5 class="text-white">Create a New Account</h5>
        </div>
        <div class="card-body">

            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" class="form-control" name="full_name" id="name" placeholder="Enter your name" >
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter a username" >
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" >
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="user_password" id="password" placeholder="Enter a password" >
                </div>

                <br>
                <button type="submit" name="signup" class="btn btn-primary btn-register">Register</button>
            </form>

        </div>
    </div>
</div>


@endsection
