@extends('layouts.admin')

@section('title', 'Events Dashboard')

@section('content')
<h2 class="text-2xl font-bold mb-4">Events</h2>

<a href="{{ route('admin.events.create') }}" class="bg-green-700 text-white px-4 py-2 rounded mb-4 inline-block">Create New Event</a>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
@endif

<table class="w-full table-auto border-collapse border border-gray-300">
    <thead>
        <tr class="bg-green-200">
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">Date</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr class="text-center">
            <td class="border px-4 py-2">{{ $event->title }}</td>
            <td class="border px-4 py-2">{{ $event->date }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('admin.events.edit', $event) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-600 text-white px-2 py-1 rounded">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $events->links() }} {{-- Pagination --}}
</div>
@endsection