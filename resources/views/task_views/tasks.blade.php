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
    <h1 class="text-center my-4 py-4" style="font-family: Tahoma, Verdana, Segoe, sans-serif">Welcome To My ToDo App</h1>

    <div class="container text-center">

        <div class="row">
            <!-- GRID 1 -->
            <div class="col">

                <!-- Button trigger modal -->
                <div style="text-align:right">
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
                                <input class="form-control" type="text" name="title" id="title" placeholder="Enter Task To Add" required>
                                <br>
                                <label for="description">Description:</label>

                                <textarea id="description" name="description" rows="2" class="form-control" placeholder="Enter your description here..." required></textarea>
                                <br>
                                <label for="due_date">Due Date:</label>
                                <input class="form-control" type="date" name="due_date" id="due_date" required>
                                <br>
                                <label for="status">Status:</label>
                                <select name="status" class="form-control" required>
                                    <option value="not-started" selected>Not Started</option>
                                    <option value="in-progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                </select>
                                <br>

                                <label for="category">Select a category:</label>
                                <select id="category" name="category" class="form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <p style="font-size: 12px"><i>No category? Go to "Manage Categories" to create one.</i></p>

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
            <div class="col" style="text-align:center">
                <a href="{{ route('category.create') }}" class="btn btn-info">Manage Categories</a>
            </div>

            <!-- GRID 3 -->
            <div class="col" style="text-align:left">

                @if(Auth::check())
                    <form action="{{ route('client.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Logout</button>
                    </form>
                @endif

            </div>
        </div>

        {{-- Search Functionality --}}
        <form action="{{ route('task.search') }}" method="GET">

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search tasks..." name="query" required>
                <button class="btn btn-outline-secondary" type="submit">🔍 Search</button>
            </div>

        </form>

    </div>


    <!--Horizontal line demacation-->
    <hr class="bg-dark w-50 m-auto">

    <div class="table-container w-50 m-auto">

        <!-- The filter field -->
        <div class="mb-3">
            <label for="statusFilter" class="form-label">Filter by Status:</label>
            <select class="form-select" id="statusFilter" onchange="filterTasks()">
                <option value="all">All</option>
                <option value="not-started">Not Started</option>
                <option value="in-progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <!-- Tasks information -->
        <table class="custom-table">
            <thead style="text-align: center">
                <tr>

                <th scope="col">Title</th>
                <th scope="col">Due Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>

                </tr>
            </thead>

            <tbody style="text-align: center">

                @if($tasks->isEmpty())
                    <p>No tasks found.</p>
                @else

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

                            // Determine if the task is due or overdue
                            $isDueOrOverdue = $timeDifference <= 0;

                        @endphp

                        {{-- achieve a separate color functionality for tasks that are "near due date" and "due (or overdue)" --}}
                        <tr class="{{ $isNearingDueDate ? 'nearing-due-date' : '' }}{{ $isNearingDueDate && $isDueOrOverdue ? ' ' : '' }}{{ $isDueOrOverdue ? 'due-or-overdue' : '' }}">

                            <td>{{ $task->title }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td class="status-cell">{{ $task->status }}</td>
                            <td>
                                <!-- This below is the show button, imported. -->
                                @include('partials.show')

                                <form action="{{ route('task.destroy', $task->id) }}" method="POST" style="display: inline;">
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
            {{ $tasks->links('pagination::simple-bootstrap-4') }}
        </div>

    </div>

</div>


@endsection
