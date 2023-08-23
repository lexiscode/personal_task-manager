@extends('layout.master')

@section('tasks')

<!-- Display login success message if it exists -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<div class="container-fluid">
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
                    <form action="{{ route('task.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add a Task</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <!--Add Task Form-->
                            <div class="w-50 m-auto">
                                <label for="title">Title:</label>
                                <input class="form-control" type="text" name="title" id="title" placeholder="Enter Task To Add">
                                <br>
                                <label for="description">Description:</label>

                                <textarea id="description" name="description" rows="2" class="form-control" placeholder="Enter your description here..."></textarea>
                                <br>
                                <label for="due_date">Due Date:</label>
                                <input class="form-control" type="date" name="due_date" id="due_date">
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
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>
                </div>

            </div>
            <!-- GRID 2 -->
            <div class="col" align="left">

                @if(Auth::check())
                    <form action="{{ route('client.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Logout</button>
                    </form>
                @endif

            </div>
        </div>
    </div>

    <br>
    <!--Horizontal line demacation-->
    <hr class="bg-dark w-50 m-auto">

    <div class="table-container">
        <h1>Your Lists</h1>

        <table class="custom-table">
            <thead style="text-align: center">
                <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Due Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>

                </tr>
            </thead>

            <tbody style="text-align: center">
                @empty($tasks)
                <p>No lists found.</p>
                @endempty

                @foreach ($tasks as $task)

                    @php
                        // Calculate due date proximity (in seconds)
                        $dueDate = strtotime($task->due_date);
                        $currentDate = strtotime(date('Y-m-d'));
                        $timeDifference = $dueDate - $currentDate;

                        // Define a threshold
                        $threshold = 1 * 24 * 60 * 60; // 1 day in seconds

                        // Determine if the task is nearing its due date
                        $isNearingDueDate = $timeDifference <= $threshold;

                    @endphp

                    <tr class="{{ $isNearingDueDate ? 'nearing-due-date' : '' }}">
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <form action="{{ route('task.destroy', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">🗑️ Delete</button>
                            </form>

                            <a href="{{ route('task.edit', $task->id) }}" style="display: inline;"><button type="button" class="btn btn-warning">📝 Update</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>


@endsection
