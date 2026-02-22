<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
          if (!$request->content && !$request->youtube_url && !$request->hasFile('image')) {
    return back()->withErrors('Post must have content, image, or video.');
}
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'youtube_url' => 'nullable|url',
        ]);

        $imageUrl = null;
        if ($request->hasFile('image')) {
            // Cloudinary configuration
            Configuration::instance([
                'cloud' => [
                    'cloud_name' => config('cloudinary.cloud_name'),
                    'api_key'    => config('cloudinary.api_key'),
                    'api_secret' => config('cloudinary.api_secret'),
                ],
                'url' => ['secure' => true],
            ]);

            $result = (new UploadApi())->upload(
                $request->file('image')->getRealPath(),
                ['folder' => 'al_maslaha/posts']
            );

            $imageUrl = $result['secure_url'];
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title.'-'.time()),
            'content' => $request->content,
            'youtube_url' => $request->youtube_url,
            'image_url' => $imageUrl,
           'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'youtube_url' => 'nullable|url',
        ]);

        $imageUrl = $post->image_url;

        if ($request->hasFile('image')) {
            Configuration::instance([
                'cloud' => [
                    'cloud_name' => config('cloudinary.cloud_name'),
                    'api_key'    => config('cloudinary.api_key'),
                    'api_secret' => config('cloudinary.api_secret'),
                ],
                'url' => ['secure' => true],
            ]);

            $result = (new UploadApi())->upload(
                $request->file('image')->getRealPath(),
                ['folder' => 'al_maslaha/posts']
            );

            $imageUrl = $result['secure_url'];
        }

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title.'-'.time()),
            'content' => $request->content,
            'youtube_url' => $request->youtube_url,
            'image_url' => $imageUrl,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully!');
    }


}