@extends('layout.master')

@section('category')


<div class="container-fluid">
    <!--Introduction header-->
    <h1 class="text-center my-4 py-4" style="font-family: Tahoma, Verdana, Segoe, sans-serif; font-weight: bold">Lexis-Task Manager</h1>

    <!--First Top Form-->
    <div class="w-50 m-auto">

        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <label for="name">Add New Category:</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Enter a New Category To Add" required>
            <br>
            <button type="submit" class="btn btn-success">Add Category</button>
        </form>

    </div>
    <br>

    <!--Horizontal line demacation-->
    <hr class="bg-dark w-50 m-auto">

    <div class="table-container w-50 m-auto">


        <!-- Tasks information -->
        <table class="custom-table">
            <thead style="text-align: center">
                <tr>

                <th scope="col">Name</th>
                <th scope="col">Action</th>

                </tr>
            </thead>

            <tbody style="text-align: center">

                @if($categories->isEmpty())
                    <p>No categories found.</p>
                @else

                    @foreach ($categories as $category)

                        <tr>
                            <td>{{ $category->name }}</td>

                            <td>

                                <a href="{{ route('category.edit', $category->id) }}" style="display: inline;"><button type="button" class="btn btn-warning">📝 Update</button></a>

                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">🗑️ Delete</button>
                                </form>

                            </td>

                        </tr>
                    @endforeach

                @endif
            </tbody>

        </table>

        <!-- Simple pagination links -->
        <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
            {{ $categories->links('pagination::simple-bootstrap-4') }}
        </div>

    </div>

    <div style="text-align: center;">
        <a href="{{ route('task.create') }}" style="text-decoration: none"><i>Return To Tasks</i></a>
    </div>

</div>

@endsection
