@extends('layout.master')

@section('homepage')


<!-- Display login success message if it exists -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="welcome-container">
    <h1>Welcome to Your Personal Task Manager</h1>
    <p>Your all-in-one solution for managing tasks effectively.</p>
    <div class="buttons">
        <a href="{{ route('client.signup') }}" class="button">Register</a>
        <a href="{{ route('client.signin') }}" class="button">Login</a>
    </div>
</div>

@endsection

