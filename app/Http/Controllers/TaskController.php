<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    /**
     * Show the form for creating a new resource and display a listing of the resource also.
     */
    public function create()
    {
        $client = Auth::user();
        $tasks = Client::find($client->id)->tasks()
                                        ->orderBy('created_at', 'desc')
                                        ->simplePaginate(4); // Changed all() to simplePaginate()

        $categories = $client->categories;

        return view('task_views.tasks', compact('tasks', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $client = Auth::user();
        Client::find($client->id)->tasks()->create($request->all());

        return redirect()->route('task.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);

        $categories = Category::all();

        return view('task_views.task_edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());

        return redirect()->route('task.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('task.create');
    }
}

