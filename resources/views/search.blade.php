@extends('layout.master')

@section('search')


<div class="container-fluid">
    <h1 class="text-center my-4 py-4">Search Results</h1>

    <!-- Display search results -->
    <div class="table-container w-50 m-auto">
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

                @if($task_search->isEmpty())
                    <p>No task found.</p>
                @else

                    @foreach ($task_search as $task)
                        <!-- Display search result details -->
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td>{{ $task->status }}</td>
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
    </div>
</div>

@endsection
