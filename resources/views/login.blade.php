@extends('layout.master')

@section('login')

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark">
            <h5 class="text-white">Login to your Account</h5>
        </div>
        <div class="card-body">

            <!-- Display registration success message if it exists -->
            @if(session('success'))
                <div id="success_message">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Display login error message if it exists -->
            @if(session('login_error'))
                <div id="error_message">
                    {{ session('login_error') }}
                </div>
            @endif

            <form action="{{ route('client.login') }}" method="POST">
                @csrf
                <br>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email address" >
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" >
                </div>

                <br>
                <button type="submit" class="btn btn-primary btn-register">Sign In</button>
            </form>

        </div>
    </div>
</div>

@endsection

