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



<div class="container">
    <!--Introduction header-->
    <h1 class="text-center my-4 py-4" style="font-family: Tahoma, Verdana, Segoe, sans-serif">Welcome To My ToDo List</h1>

    <div class="container text-center">
        <div class="row">
            <!-- GRID 1 -->
            <div class="col">

                <!-- Button trigger modal -->
                <div align="right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add To ToDo
                </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="POST" autocomplete="off">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add a Task</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!--Add Task Form-->
                        <div class="w-50 m-auto">
                            <label for="title">Title:</label>
                            <input class="form-control" type="text" name="title" id="title" placeholder="Enter Task To Add in Todo">
                            <br>
                            <label for="description">Description:</label>
                            <input class="form-control" type="text" name="description" id="description">
                            <br>
                            <label for="due_date">Due Date:</label>
                            <input class="form-control" type="date" name="due_date" id="due_date" placeholder="Enter Task To Add in Todo">
                            <br>
                            <label for="status">Status:</label>
                            <select name="status">
                                <option value="pending" selected>Pending</option>
                                <option value="in-progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                            <br>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
                    </form>
                </div>
                </div>

            </div>
            <!-- GRID 2 -->
            <div class="col" align="left">

                <form action="" method="POST">
                    <button type="submit" class="btn btn-secondary" name="clearLists">Clear Lists</button>
                </form>

            </div>
        </div>
    </div>

    <br>
    <!--Horizontal line demacation-->
    <hr class="bg-dark w-50 m-auto">

    <div class="container-fluid">
        <h1>Your Lists</h1>

        <table class="table table-dark table-hover">
            <thead align="center">
                <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Due Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody align="center">
                @foreach ($tasks as $task)
                @endforeach
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <a href="modify_products?delete=<?= $row_data['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Delete</a>
                            <a href="edit_product?id=<?= $row_data['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i>Update</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            @empty($tasks)
                <p>No lists found.</p>
            @endempty

        </table>
    </div>

</div>


@endsection
