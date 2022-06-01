<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Place;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index', [
            'title' => 'Kategorier',
            'categories' => Category::whereNull('parent_id')->latest()->get(),
            'posts' => Post::orderBy('hits', 'desc')->paginate(6)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Place $place)
    {
        return view('categories.create', [
            'seoTitle' => 'Ny kategori',
            'title' => 'Ny kategori til ' . $place->title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'place_id' => ['required','numeric'],
            'type' => ['required','numeric'],
            'parent_id' => 'numeric',
            'title' => 'required',
            'description' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Category::create($formFields);

        return back()->with('message', 'Forum kategori created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', [
            'category' => $category,
            'categories' => Category::where('parent_id', $category->id)->get(),
            'posts' => Post::where('category_id', $category->id)->paginate(6),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
