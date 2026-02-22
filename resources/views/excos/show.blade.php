@extends('layouts.app')

@section('title', $exco->name)

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10 text-center">
    <img src="{{ $exco->photo }}"
         class="w-40 h-40 mx-auto rounded-full object-cover">

    <h1 class="mt-4 text-2xl font-bold text-green-800">
        {{ $exco->name }}
    </h1>

    <p class="text-gray-500">
        {{ $exco->position }}
    </p>

    <div class="mt-6 text-gray-700 leading-relaxed">
        {!! nl2br(e($exco->bio)) !!}
    </div>

    <a href="{{ route('excos.index') }}"
       class="inline-block mt-6 text-green-600 hover:underline">
        ← Back to Excos
    </a>
</div>
@endsection