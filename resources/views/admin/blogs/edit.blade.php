@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-5">Edit Blog</h1>

<form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ old('title', $blog->title) }}" class="w-full border p-2 rounded" required>
    <textarea name="excerpt" class="w-full border p-2 rounded" rows="2">{{ old('excerpt', $blog->excerpt) }}</textarea>
    <textarea name="content" class="w-full border p-2 rounded" rows="6">{{ old('content', $blog->content) }}</textarea>

    @if($blog->image_url)
        <p class="font-semibold mb-2">Current Image:</p>
        <img src="{{ $blog->image_url }}" class="w-32 h-32 object-cover rounded">
    @endif

    <input type="file" name="image" class="border p-2 rounded">

    <div class="flex gap-3">
        <button class="bg-green-700 text-white px-6 py-2 rounded">Update Blog</button>
        <a href="{{ route('admin.blogs.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded">Cancel</a>
    </div>
</form>
@endsection