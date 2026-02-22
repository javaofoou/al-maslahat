@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-5">Latest Posts</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($posts as $post)
    <div class="bg-green-900 text-white p-4 rounded-xl shadow-lg">
        @if($post->image_url)
            <img src="{{ $post->image_url }}" class="w-full h-40 object-cover rounded mb-3">
        @endif
        <h2 class="font-bold text-lg mb-2">{{ $post->title }}</h2>
        <p class="mb-2">{{ Str::limit(strip_tags($post->content), 100) }}</p>
        @if($post->youtube_url)
            <a href="{{ $post->youtube_url }}" target="_blank" class="text-lime-400 underline mb-2 block">Watch Video</a>
        @endif
        <a href="{{ route('posts.show', $post->slug) }}" class="bg-lime-400 text-green-900 px-3 py-1 rounded">Read More</a>
    </div>
    @endforeach
</div>

<div class="mt-6">
    {{ $posts->links() }}
</div>
@endsection