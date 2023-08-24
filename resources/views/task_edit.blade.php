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

            <label for="status" class="form-label">Status:</label>
            <select class="form-select" name="status" id="status" required>
                @php
                $statuses = ["not-started", "in-progress", "completed"];

                foreach ($statuses as $type) {
                    $selected = ($type === $task->status) ? "selected" : "";
                    echo "<option value='$type' $selected>$type</option>";
                }
                @endphp
            </select>
            <br>

            <label for="category" class="form-label">Category:</label>
            <select class="form-select" name="category" id="category" required>
                @foreach ($categories as $categoryOption)
                    <option value="{{ $categoryOption->name }}" {{ $categoryOption->name === $task->category ? 'selected' : '' }}>
                        {{ $categoryOption->name }}
                    </option>
                @endforeach
            </select>
            <br>

            <div style="text-align: center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>

    <div style="text-align: center;">
        <a href="{{ route('task.create') }}" style="text-decoration: none"><i>Return To Tasks</i></a>
    </div>

@endsection
