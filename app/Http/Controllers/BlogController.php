<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(6);
        return view('blogs.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $comments = $blog->comments()->latest()->get();
        return view('blogs.show', compact('blog', 'comments'));
    }

    public function comment(Request $request, Blog $blog)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        $blog->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added!');
    }
}