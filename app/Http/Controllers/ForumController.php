<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Thread;
use App\Models\Category;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place, $category)
    {
        $forum = Category::where('id', $category)->first();
        return view('forums.show', [
            'seoTitle' => $place->title . ' forum ' . $forum->title,
            'title' => $place->title,
            'place' => $place,
            'forum' => $forum,
            'threads' => Thread::where('category_id', $forum->id)->paginate(6),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
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
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function thread(Place $place, $category, $thread)
    {
        $forum = Category::where('id', $category)->first();
        $thread = Thread::where('id', $thread)->first();
        return view('forums.thread', [
            'seoTitle' => $thread->title . ' forum ' . $forum->title,
            'title' => $place->title,
            'place' => $place,
            'forum' => $forum,
            'thread' => $thread,
        ]);
    }
}
