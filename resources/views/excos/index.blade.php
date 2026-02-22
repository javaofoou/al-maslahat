@extends('layouts.app')

@section('title', 'Meet Our Excos')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-green-700 mb-8">Meet Our Excos</h1>

    <div class="grid md:grid-cols-4 gap-6">
        @foreach($excos as $exco)
            <div class="bg-white shadow rounded-lg text-center p-5">
                <img src="{{ $exco->photo }}"
                     class="w-32 h-32 mx-auto rounded-full object-cover">

                <h2 class="mt-4 text-lg font-semibold text-green-800">
                    {{ $exco->name }}
                </h2>

                <p class="text-sm text-gray-500">
                    {{ $exco->position }}
                </p>

                <a href="{{ route('excos.show', $exco) }}"
                   class="inline-block mt-3 text-green-600 hover:underline">
                    View Profile →
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection