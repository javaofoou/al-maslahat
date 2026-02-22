@extends('layouts.admin')

@section('title', 'Edit Exco')

@section('content')
<h2 class="text-2xl font-bold mb-4">Edit Exco</h2>

<form action="{{ route('admin.excos.update', $exco) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $exco->name }}" placeholder="Name" class="w-full border p-2 rounded mb-2" required>
    <input type="text" name="position" value="{{ $exco->position }}" placeholder="Position" class="w-full border p-2 rounded mb-2" required>
    <input type="file" name="image" class="border p-2 rounded mb-2">
    @if($exco->image_url)
        <p>Current Image:</p>
        <img src="{{ $exco->image_url }}" alt="{{ $exco->name }}" class="w-24 h-24 object-cover rounded-full mb-2">
    @endif
    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Exco</button>
</form>
@endsection