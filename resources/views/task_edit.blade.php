@extends('layout.master')

@section('task_show')


<div class="container">
    <!--Introduction header-->
    <h1 class="text-center my-4 py-4" style="font-family: Tahoma, Verdana, Segoe, sans-serif">Update ToDo Task</h1>

    <div class="w-50 m-auto">
        <form action="{{ route('task.update', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ $task->title }}" placeholder="Enter Task To Add">
            <br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="2" class="form-control" placeholder="Enter your description here...">{{ $task->description }}</textarea>
            <br>
            <label for="due_date">Due Date:</label>
            <input class="form-control" type="date" name="due_date" id="due_date" value="{{ $task->due_date }}">
            <br>

            <label for="status">Status:</label>
            <select name="status" id="status" required>
                @php
                $statuses = ["pending", "in-progress", "completed"];

                foreach ($statuses as $type) {
                    $selected = ($type === $task->status) ? "selected" : "";
                    echo "<option value='$type' $selected>$type</option>";
                }
                @endphp
            </select>
            <br><br>

            <div style="text-align: center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

@endsection
