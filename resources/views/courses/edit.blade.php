<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('courses.update', $course->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('name', $course->name) }}" required autofocus>
                            @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $course->description) }}</textarea>
                            @error('description')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                            <input type="text" name="level" id="level" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('level', $course->level) }}">
                            @error('level')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="is_published" class="block text-sm font-medium text-gray-700">Published</label>
                            <input type="checkbox" name="is_published" id="is_published" {{ old('is_published', $course->is_published) ? 'checked' : '' }}>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="ml-3 py-2 px-4 mx-2 w-1/6 text-center rounded border border-red-600 hover:bg-red-600 text-red-600 hover:text-white transition duration-500">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
