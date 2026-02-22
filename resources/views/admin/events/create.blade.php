@extends('layouts.admin')

@section('title', 'Create Event')

@section('content')
<h2 class="text-2xl font-bold mb-4">Create Event</h2>

<form action="{{ route('admin.events.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Event Title" class="w-full border p-2 rounded mb-2" required>
    <textarea name="description" placeholder="Description" class="w-full border p-2 rounded mb-2" rows="5" required></textarea>
    <input type="date" name="date" class="w-full border p-2 rounded mb-2" required>
    <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded">Create Event</button>
</form>
@endsection