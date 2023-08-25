@extends('layout.master')

@section('task_show')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-5">
                <div class="card-header">
                    <h2 class="text-center" style="margin-bottom: -3px">Update ToDo Task</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('task.update', ['task' => $task->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ $task->title }}" placeholder="Enter Task To Add" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea id="description" name="description" rows="2" class="form-control" placeholder="Enter your description here..." required>{{ $task->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date:</label>
                            <input class="form-control" type="date" name="due_date" id="due_date" value="{{ $task->due_date }}" required>
                        </div>

                        <div class="mb-3">
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
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category:</label>
                            <select class="form-select" name="category" id="category" required>
                                @foreach ($categories as $categoryOption)
                                    <option value="{{ $categoryOption->name }}" {{ $categoryOption->name === $task->category ? 'selected' : '' }}>
                                        {{ $categoryOption->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('task.create') }}" class="text-decoration-none">Return To Tasks</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
