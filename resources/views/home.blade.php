@extends('layout.master')


@section('home-styles')
    <link rel="stylesheet" href="{{ asset("css/home.css") }}">
@endsection


@section('homepage')

<div class="welcome-container">
    <h1>Welcome to Your Personal Task Manager</h1>
    <p>Your all-in-one solution for managing tasks effectively.</p>
    <div class="buttons">
        <a href="{{ route('client.signup') }}" class="button">Register</a>
        <a href="{{ route('client.signin') }}" class="button">Login</a>
    </div>

</div>

@endsection


@section('home-js')
    <script src='{{ asset("js/home_rain.js") }}' async></script>
@endsection
