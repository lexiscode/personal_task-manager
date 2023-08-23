<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->input('query');

        $task_search = Task::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();


        return view('search', compact('task_search'));
    }

}
