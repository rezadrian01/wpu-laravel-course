<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('author_id', Auth::user()->id)->latest()->paginate(10)->withQueryString();
        return view('posts.index', ["title" => "Blog Page", 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', ["title" => "Create Post", "categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'title' => 'required|max:255|unique:posts',
            'category_id' => 'required',
            'body' => 'required|min:10|max:2000',
        ]);
        // Store
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title),
            'author_id'=> Auth::user()->id,
            'category_id' => $request->category_id
        ]);

        // Redirect
        return redirect('/dashboard')->with(['success' => 'Post created!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post, 'title' => 'Single Post']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
//        dd($post);
        return view('posts.edit',["title" => "Edit Post", "categories" => $categories, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate
        $request->validate([
            'title' => 'required|max:255|unique:posts,title,' . $post->id,
            'category_id' => 'required',
            'body' => 'required|min:10|max:2000',
        ]);
        // Store
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id
        ]);

        // Redirect
        return redirect('/dashboard')->with(['success' => 'Post updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/dashboard')->with(['success' => 'Post deleted!']);
    }
}
