@extends('layout.master')

@section('tasks')

<!-- Display login success message if it exists -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Assuming this is a blade template -->
@if(Auth::check())
<form action="{{ route('client.logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-link">Logout</button>
</form>
@endif

@endsection
