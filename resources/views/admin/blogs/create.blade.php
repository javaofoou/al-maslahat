@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-5">Create Blog</h1>

<form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <input type="text" name="title" placeholder="Blog Title" class="w-full border p-2 rounded" required>
    <textarea name="excerpt" placeholder="Short Excerpt (optional)" class="w-full border p-2 rounded" rows="2"></textarea>
    <textarea name="content" placeholder="Full Content" class="w-full border p-2 rounded" rows="6" required></textarea>
    <input type="file" name="image" class="border p-2 rounded">
    <button class="bg-green-700 text-white px-4 py-2 rounded">Create Blog</button>
</form>
@endsection