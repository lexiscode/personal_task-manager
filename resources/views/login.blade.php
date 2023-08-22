@extends('layout.master')

@section('login')

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark">
            <h5 class="text-white">Login to your Account</h5>
        </div>
        <div class="card-body">

            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" >
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="user_password" id="password" placeholder="Enter your password" >
                </div>

                <br>
                <button type="submit" name="signin" class="btn btn-primary btn-register">Sign In</button>
            </form>

        </div>
    </div>
</div>

@endsection

