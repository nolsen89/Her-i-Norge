<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'title' => 'Nyeste artikler',
            'posts' => Post::latest()->filter(request(['tag', 'search']))->paginate(6),
            'categories' => Category::where('type','=','1')->whereNull('parent_id')->latest()->filter(request(['title']))->paginate(6)

        ]);
    }

    public function show(Post $post)
    {
        $post->hits += 1;
        if($post->created_at == null){
            $post->created_at = Carbon::now();
        }
        $post->timestamps = false;
        $post->save();
        return view('posts.show', [
            'seoTitle' => $post->title . ' - Her i Norge',
            'post' => $post,
        ]);
    }

    // Show create form
    public function create()
    {
        return view('posts.create', [
            'title' => 'Ny artikkel',
            'categories' => Category::all(),
        ]);
    }

    // Store post Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'category_id' => ['required','numeric'],
            'title' => ['required', Rule::unique('posts', 'title')],
            'description' => 'required',
            'body' => 'required',
            'tags' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('posts', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Post::create($formFields);

        return redirect('/')->with('message', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    // Update post Data
    public function update(Request $request, Post $post)
    {
        // Make sure logged in user is owner
        if ($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'body' => 'required',
            'tags' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($post->image);
            $formFields['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($formFields);

        return redirect('posts/manage')->with('message', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        // Make sure logged in user is owner
        if ($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }

        $post->delete();
        return redirect('/posts/manage')->with('message', 'Post deleted successfully!');
    }

    // Manage posts
    public function manage()
    {
        return view('posts.manage', [
            'title' => 'Dine artikler',
            'posts' => auth()->user()->post()->latest()->get(),
            'categories' => Category::whereNull('parent_id')->latest()->filter(request(['title']))->paginate(6)
        ]);
    }
}
