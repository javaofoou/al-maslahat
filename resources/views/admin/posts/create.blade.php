@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-5">Create Post</h1>

<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <input type="text" name="title" placeholder="Title" class="w-full border p-2 rounded" required>
    <textarea name="content" placeholder="Content" class="w-full border p-2 rounded" rows="5"></textarea>
    <input type="url" name="youtube_url" placeholder="YouTube URL" class="w-full border p-2 rounded">
    <input type="file" name="image" class="border p-2 rounded">
    <button class="bg-green-700 text-white px-4 py-2 rounded">Create Post</button>
</form>
@endsection