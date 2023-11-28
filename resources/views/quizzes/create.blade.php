<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('quizzes.store') }}">
                        @csrf

                        <!-- Course Selection -->
                        <div class="mb-4">
                            <label for="course_id" class="block text-sm font-medium text-gray-700">Course</label>
                            <select name="course_id" id="course_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm" required autofocus>
                            @error('title')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                            @error('description')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Total Questions -->
                        <div class="mb-4">
                            <label for="total_questions" class="block text-sm font-medium text-gray-700">Total Questions</label>
                            <input type="number" name="total_questions" id="total_questions" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('total_questions')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Active Status -->
                        <div class="mb-4">
                            <label for="active_status" class="block text-sm font-medium text-gray-700">Active Status</label>
                            <input type="checkbox" name="active_status" id="active_status">
                        </div>

                        <!-- Published Status -->
                        <div class="mb-4">
                            <label for="is_published" class="block text-sm font-medium text-gray-700">Published</label>
                            <input type="checkbox" name="is_published" id="is_published">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                {{ __('Create') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
