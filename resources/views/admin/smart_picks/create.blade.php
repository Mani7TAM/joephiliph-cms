@extends('layouts.admin')
@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-xl font-semibold mb-4">Add New Smart Pick</h2>
        <form action="{{ route('smart_picks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="rating" class="block text-sm font-medium text-gray-700">Rating (0-5)</label>
                <input type="number" name="rating" id="rating" step="0.1" min="0" max="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('rating')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <input type="text" name="category" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('category')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="affiliate_link" class="block text-sm font-medium text-gray-700">Affiliate Link</label>
                <input type="url" name="affiliate_link" id="affiliate_link" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('affiliate_link')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full">
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
        </form>
    </div>
@endsection