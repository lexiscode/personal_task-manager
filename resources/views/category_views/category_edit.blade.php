@extends('layout.master')

@section('category_show')


<div class="container">
    <!--Introduction header-->
    <h1 class="text-center my-4 py-4" style="font-family: Tahoma, Verdana, Segoe, sans-serif">Update Category Name</h1>

    <div class="w-50 m-auto">
        <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="category" class="form-label">Category Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            </option>

            <br><br>

            <div style="text-align: center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

@endsection
