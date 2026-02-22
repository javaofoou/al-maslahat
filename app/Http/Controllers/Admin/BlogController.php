<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imageUrl = null;

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
                ['folder' => 'al_maslaha/blogs']
            );

            $imageUrl = $result['secure_url'];
        }

        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title.'-'.time()),
            'excerpt' => $request->excerpt ?? Str::limit(strip_tags($request->content), 120),
            'content' => $request->content,
            'image_url' => $imageUrl,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imageUrl = $blog->image_url;

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
                ['folder' => 'al_maslaha/blogs']
            );

            $imageUrl = $result['secure_url'];
        }

        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title.'-'.time()),
            'excerpt' => $request->excerpt ?? Str::limit(strip_tags($request->content), 120),
            'content' => $request->content,
            'image_url' => $imageUrl,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully!');
    }
}