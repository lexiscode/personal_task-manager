@extends('layout.master')

@section('category_show')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-5">
                <div class="card-header">
                    <h2 class="text-center" style="margin-bottom: -3px">Update Category Name</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="category" class="form-label">Category Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('category.create') }}" class="text-decoration-none">Return To Categories</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

