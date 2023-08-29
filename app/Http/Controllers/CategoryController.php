<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{

    /**
     * Show the form for creating a new resource and display a listing of the resource also.
     */
    public function create()
    {
        $client = Auth::user();
        $categories = Client::find($client->id)->categories()
                                                ->orderBy('created_at', 'desc')
                                                ->simplePaginate(4);

        return view('category_views.category', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = Auth::user();
        Client::find($client->id)->categories()->create($request->all());

        return redirect()->route('category.create');

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
        $category = Category::findOrFail($id);

        return view('category_views.category_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('category.create');
    }

    /**
     * Remove the specified resource from storage.
     * NB: Just chose to use an alternative destory() style method, unlike in the one in my TaskController
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.create');
    }
}

