@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Post</h1>

<form action="{{ route('admin.posts.update', $post) }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-4">

    @csrf
    @method('PUT')

    <!-- Title -->
    <div>
        <label class="block mb-1 font-semibold">Title</label>
        <input type="text"
               name="title"
               value="{{ old('title', $post->title) }}"
               class="w-full border p-2 rounded"
               required>
    </div>

    <!-- Content -->
    <div>
        <label class="block mb-1 font-semibold">Content</label>
        <textarea name="content"
                  rows="6"
                  class="w-full border p-2 rounded">{{ old('content', $post->content) }}</textarea>
    </div>

    <!-- YouTube -->
    <div>
        <label class="block mb-1 font-semibold">YouTube URL</label>
        <input type="url"
               name="youtube_url"
               value="{{ old('youtube_url', $post->youtube_url) }}"
               class="w-full border p-2 rounded">
    </div>

    <!-- Existing Image -->
    @if($post->image_url)
        <div>
            <p class="font-semibold mb-2">Current Image</p>
            <img src="{{ $post->image_url }}"
                 class="w-32 h-32 object-cover rounded">
        </div>
    @endif

    <!-- Upload New Image -->
    <div>
        <label class="block mb-1 font-semibold">Replace Image</label>
        <input type="file"
               name="image"
               class="border p-2 rounded">
    </div>

    <!-- Buttons -->
    <div class="flex gap-3">
        <button class="bg-green-700 text-white px-6 py-2 rounded">
            Update Post
        </button>

        <a href="{{ route('admin.posts.index') }}"
           class="bg-gray-500 text-white px-6 py-2 rounded">
            Cancel
        </a>
    </div>

</form>
@endsection