@extends('layouts.app')

@section('title', $event->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-green-800">
        {{ $event->title }}
    </h1>

    <p class="text-sm text-gray-500 mt-2">
        {{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}
    </p>

    <div class="mt-6 text-gray-800 leading-relaxed">
        {!! nl2br(e($event->description)) !!}
    </div>

    <a href="{{ route('events.index') }}"
       class="inline-block mt-6 text-green-600 hover:underline">
        ← Back to Events
    </a>
</div>
@endsection