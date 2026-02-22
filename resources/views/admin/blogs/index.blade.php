@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-5">All Blogs</h1>

<a href="{{ route('admin.blogs.create') }}" class="bg-green-700 text-white px-4 py-2 rounded">Add New Blog</a>

<table class="w-full mt-5 table-auto">
    <thead>
        <tr>
            <th class="px-4 py-2">Title</th>
            <th class="px-4 py-2">Image</th>
            <th class="px-4 py-2">Excerpt</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $blog->title }}</td>
            <td class="px-4 py-2">
                @if($blog->image_url)
                <img src="{{ $blog->image_url }}" class="w-16 h-16 rounded" />
                @endif
            </td>
            <td class="px-4 py-2">{{ $blog->excerpt }}</td>
            <td class="px-4 py-2 flex gap-2">
                <a href="{{ route('admin.blogs.edit', $blog) }}" class="bg-yellow-500 px-2 py-1 rounded">Edit</a>
                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" onsubmit="return confirm('Delete this blog?');">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 px-2 py-1 rounded text-white">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $blogs->links() }}
@endsection