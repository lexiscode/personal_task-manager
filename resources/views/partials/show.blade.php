<!-- Button trigger modal --> <!--notice data-bs-target, aria-labelledby and id below for each loops-->
<button type="button" class="btn btn-warning" style="display: inline;" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $task->id }}">
    📖 Show
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $task->id }}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel{{ $task->id }}">Task Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <h2 style="color: black;">{{ $task->title }}</h2>
        <p style="color: black;"><b>ID:</b> {{ $task->id }}</p>
        <p style="color: black;"><b>Description:</b> {{ $task->description }}</p>
        <p style="color: black;"><b>Due Date:</b> {{ $task->due_date }}</p>
        <p style="color: black;"><b>Status:</b> {{ $task->status }}</p>
        <p style="color: black;"><b>Category:</b> {{ $task->category }}</p>

        <!--Horizontal line demacation-->
        <hr class="bg-dark w-50 m-auto">

        <p style="color: black;"><b>Date Created:</b> {{ $task->created_at }}</p>
        <p style="color: black;"><b>Last Updated:</b> {{ $task->updated_at }}</p>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="{{ route('task.edit', $task->id) }}"><button type="button" class="btn btn-warning">📝 Update</button></a>
    </div>
    </div>
</div>
</div>
