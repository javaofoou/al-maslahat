<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    // Display all posts
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }

    // Display single post
    public function show(Post $post)
    {
        $comments = $post->comments()->latest()->get();
        return view('posts.show', compact('post', 'comments'));
    }

    // Store comment
    public function comment(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added!');
    }
}