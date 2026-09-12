<?php
// app/Http/Controllers/PostController.php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // view all posts
    public function index() {
        $posts = Post::latest()->get(); // $posts = Post::all()
        return view('posts.index', compact('posts'));
    }

    // Shows the form, create.blade.php
    public function create() {
        return view('posts.create');
    }

    // Saves the data from the form
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required',
        ]);

        Post::create($request->only(['title', 'body'])); 

        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully!');
    }

    // view a post
    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    // show edit form with a post data // at /posts/1/edit
    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }

    // save changes to db
    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required',
        ]);

        $post->update($request->only(['title', 'body']));

        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully!');
    }

    // delete a post
    public function destroy(Post $post) {
        $post->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully!');
    }
}
