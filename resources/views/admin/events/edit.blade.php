@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
<h2 class="text-2xl font-bold mb-4">Edit Event</h2>

<form action="{{ route('admin.events.update', $event) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $event->title }}" placeholder="Event Title" class="w-full border p-2 rounded mb-2" required>
    <textarea name="description" placeholder="Description" class="w-full border p-2 rounded mb-2" rows="5" required>{{ $event->description }}</textarea>
    <input type="date" name="date" value="{{ $event->date }}" class="w-full border p-2 rounded mb-2" required>
    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Event</button>
</form>
@endsection