@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-5">Latest Blogs</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($blogs as $blog)
    <div class="bg-green-900 text-white p-4 rounded-xl shadow-lg">
        @if($blog->image_url)
            <img src="{{ $blog->image_url }}" class="w-full h-40 object-cover rounded mb-3">
        @endif
        <h2 class="font-bold text-lg mb-2">{{ $blog->title }}</h2>
        <p class="mb-2">{{ $blog->excerpt }}</p>
        <a href="{{ route('blogs.show', $blog->slug) }}" class="bg-lime-400 text-green-900 px-3 py-1 rounded">Read More</a>
    </div>
    @endforeach
</div>

<div class="mt-6">
    {{ $blogs->links() }}
</div>
@endsection