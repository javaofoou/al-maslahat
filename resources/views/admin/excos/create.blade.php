@extends('layouts.admin')

@section('title', 'Add New Exco')

@section('content')
<h2 class="text-2xl font-bold mb-4">Add New Exco</h2>

<form action="{{ route('admin.excos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Name" class="w-full border p-2 rounded mb-2" required>
    <input type="text" name="position" placeholder="Position" class="w-full border p-2 rounded mb-2" required>
    <input type="file" name="image" class="border p-2 rounded mb-2">
    <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded">Create Exco</button>
</form>
@endsection