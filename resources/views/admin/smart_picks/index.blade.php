@extends('layouts.admin')
@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-xl font-semibold mb-4">Smart Picks</h2>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('smart_picks.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">Add New Smart Pick</a>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Title</th>
                    <th class="border p-2">Category</th>
                    <th class="border p-2">Rating</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($smartPicks as $smartPick)
                    <tr>
                        <td class="border p-2">{{ $smartPick->title }}</td>
                        <td class="border p-2">{{ $smartPick->category }}</td>
                        <td class="border p-2">{{ $smartPick->rating }}</td>
                        <td class="border p-2">
                            <a href="{{ route('smart_picks.edit', $smartPick) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('smart_picks.destroy', $smartPick) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection