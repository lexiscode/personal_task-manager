@extends("layout.master")


@section('register-login-styles')
    <link rel="stylesheet" href="{{ asset("css/signinup.css") }}">
@endsection

@section('register')

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark">
            <h5 class="text-white">Create a New Account</h5>
        </div>
        <div class="card-body">

            <form action="{{ route('client.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" class="form-control" name="full_name" id="name" placeholder="Enter your name" >
                    @error('full_name')
                        <code class='code'>{{ $message }}</code>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter a username" >
                    @error('username')
                        <code>{{ $message }}</code>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" >
                    @error('email')
                        <code>{{ $message }}</code>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter a password" >
                    @error('password')
                        <code>{{ $message }}</code>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm password">
                </div>

                <br>
                <button type="submit" class="btn-register">Register</button>
            </form>

        </div>
    </div>
    <div style="text-align: center; margin-top: 2px;">
        <a href="{{ route('home') }}" style="text-decoration: none; color: black"><i>Return To Homepage</i></a>
    </div>
</div>


@endsection
