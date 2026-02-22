@extends('layouts.app')

@section('content')
<div class="bg-green-900 text-white p-6 rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold mb-4">{{ $blog->title }}</h1>

    @if($blog->image_url)
        <img src="{{ $blog->image_url }}" class="w-full h-60 object-cover rounded mb-4">
    @endif

    <p class="mb-4">{!! nl2br(e($blog->content)) !!}</p>

    <hr class="my-4">

    <h2 class="text-xl font-semibold mb-2">Comments</h2>

    @foreach($blog->comments as $comment)
        <div class="bg-green-800 p-3 rounded mb-2">
            <p class="font-bold">{{ $comment->user->name }}</p>
            <p>{{ $comment->comment }}</p>
        </div>
    @endforeach

    @auth
    <form action="{{ route('blogs.comment', $blog) }}" method="POST" class="mt-4">
        @csrf
        <textarea name="comment" class="w-full border p-2 rounded mb-2" rows="3" placeholder="Add a comment" required></textarea>
        <button class="bg-lime-400 text-green-900 px-4 py-2 rounded">Post Comment</button>
    </form>
    @else
    <p class="mt-2 text-gray-200">Please <a href="{{ route('login') }}" class="underline">login</a> to comment.</p>
    @endauth
</div>
@endsection