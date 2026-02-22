@extends('layouts.admin')

@section('title', 'Excos Dashboard')

@section('content')
<h2 class="text-2xl font-bold mb-4">Executive Committee Members</h2>

<a href="{{ route('admin.excos.create') }}" class="bg-green-700 text-white px-4 py-2 rounded mb-4 inline-block">Add New Exco</a>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
@endif

<table class="w-full table-auto border-collapse border border-gray-300">
    <thead>
        <tr class="bg-green-200">
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Position</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($excos as $exco)
        <tr class="text-center">
            <td class="border px-4 py-2">{{ $exco->name }}</td>
            <td class="border px-4 py-2">{{ $exco->position }}</td>
            <td class="border px-4 py-2">
                @if($exco->image_url)
                    <img src="{{ $exco->image_url }}" alt="{{ $exco->name }}" class="w-16 h-16 object-cover mx-auto rounded-full">
                @else
                    N/A
                @endif
            </td>
            <td class="border px-4 py-2">
                <a href="{{ route('admin.excos.edit', $exco) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                <form action="{{ route('admin.excos.destroy', $exco) }}" method="POST" class="inline-block">
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
    {{ $excos->links() }}
</div>
@endsection