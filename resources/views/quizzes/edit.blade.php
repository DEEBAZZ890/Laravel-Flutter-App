<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($errors->any())
                        <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                            <i class="fa fa-triangle-exclamation text-xl pl-2 pr-4"></i>
                            You have errors in your form submission.
                        </div>
                    @endif

                    <form action="{{ route('quizzes.update', $quiz->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('title', $quiz->title) }}" required autofocus>
                            @error('title')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $quiz->description) }}</textarea>
                            @error('description')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="total_questions" class="block text-sm font-medium text-gray-700">Total Questions</label>
                            <input type="number" name="total_questions" id="total_questions" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('total_questions', $quiz->total_questions) }}">
                            @error('total_questions')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="active_status" class="block text-sm font-medium text-gray-700">Active Status</label>
                            <input type="checkbox" name="active_status" id="active_status" {{ old('active_status', $quiz->active_status) ? 'checked' : '' }}>
                        </div>

                        <div class="mb-4">
                            <label for="is_published" class="block text-sm font-medium text-gray-700">Published</label>
                            <input type="checkbox" name="is_published" id="is_published" {{ old('is_published', $quiz->is_published) ? 'checked' : '' }}>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('quizzes.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                            >{{ __('Cancel') }}</a>

                            <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
