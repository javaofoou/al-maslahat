@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-5">All Posts</h1>

<a href="{{ route('admin.posts.create') }}" class="bg-green-700 text-white px-4 py-2 rounded">Add New Post</a>

<table class="w-full mt-5 table-auto">
    <thead>
        <tr>
            <th class="px-4 py-2">Title</th>
            <th class="px-4 py-2">Image</th>
            <th class="px-4 py-2">YouTube</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $post->title }}</td>
            <td class="px-4 py-2">
                @if($post->image_url)
                <img src="{{ $post->image_url }}" class="w-16 h-16 rounded" />
                @endif
            </td>
            <td class="px-4 py-2">
                @if($post->youtube_url)
                <a href="{{ $post->youtube_url }}" target="_blank" class="text-blue-500">View</a>
                @endif
            </td>
            <td class="px-4 py-2 flex gap-2">
                <a href="{{ route('admin.posts.edit', $post) }}" class="bg-yellow-500 px-2 py-1 rounded">Edit</a>
                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?');">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 px-2 py-1 rounded text-white">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links() }}
@endsection