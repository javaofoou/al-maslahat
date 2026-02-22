@extends('layouts.app')

@section('content')
<div class="bg-green-900 text-white p-6 rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>

    @if($post->image_url)
        <img src="{{ $post->image_url }}" class="w-full h-60 object-cover rounded mb-4">
    @endif

   @php
    $embed_url = null;

    if($post->youtube_url) {
        // YouTube embed
        if(str_contains($post->youtube_url, 'watch?v=')) {
            $embed_url = str_replace('watch?v=', 'embed/', $post->youtube_url);
        } elseif(str_contains($post->youtube_url, 'youtu.be')) {
            $video_id = last(explode('/', $post->youtube_url));
            $embed_url = 'https://www.youtube.com/embed/' . $video_id;
        }
    } elseif($post->facebook_url) {
        // Facebook embed
        $embed_url = 'https://www.facebook.com/plugins/video.php?href=' . urlencode($post->facebook_url) . '&show_text=0&width=560';
    }
@endphp

@if($embed_url)
    <div class="mb-4">
        <iframe class="w-full h-60 rounded" 
                src="{{ $embed_url }}" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen>
        </iframe>
    </div>
@endif

    <p class="mb-4">{!! nl2br(e($post->content)) !!}</p>

    <hr class="my-4">

    <h2 class="text-xl font-semibold mb-2">Comments</h2>

    @foreach($comments as $comment)
        <div class="bg-green-800 p-3 rounded mb-2">
            <p class="font-bold">{{ $comment->user->name }}</p>
            <p>{{ $comment->comment }}</p>
        </div>
    @endforeach

    @auth
    <form action="{{ route('posts.comment', $post) }}" method="POST" class="mt-4">
        @csrf
        <textarea name="comment" class="w-full border p-2 rounded mb-2" rows="3" placeholder="Add a comment" required></textarea>
        <button class="bg-lime-400 text-green-900 px-4 py-2 rounded">Post Comment</button>
    </form>
    @else
    <p class="mt-2 text-gray-200">Please <a href="{{ route('login') }}" class="underline">login</a> to comment.</p>
    @endauth
</div>
@endsection