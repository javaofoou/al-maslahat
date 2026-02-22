@extends('layouts.app')

@section('title', 'Upcoming Events')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-green-700 mb-8">Upcoming Events</h1>

    <div class="grid md:grid-cols-3 gap-6">
        @foreach($events as $event)
            <div class="bg-white shadow rounded-lg p-5">
                <h2 class="text-xl font-semibold text-green-800">
                    {{ $event->title }}
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    {{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}
                </p>

                <p class="mt-3 text-gray-700 line-clamp-3">
                    {{ Str::limit($event->description, 120) }}
                </p>

                <a href="{{ route('events.show', $event) }}"
                   class="inline-block mt-4 text-green-600 font-medium hover:underline">
                    View Details →
                </a>
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $events->links() }}
    </div>
</div>
@endsection