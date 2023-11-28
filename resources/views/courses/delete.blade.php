{{-- resources/views/courses/delete.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Delete Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-bold text-gray-700 text-lg mb-4">
                        {{ __("Are you sure you want to delete this course?") }}
                    </h3>
                    <p class="text-red-500 mb-4">
                        {{ __("Warning: Deleting this course will also delete all related quizzes.") }}
                    </p>

                    <div class="flex flex-col">
                        <p class="">{{ __("Course Name:") }} {{ $course->name }}</p>
                        <p class="">{{ __("Description:") }} {{ $course->description }}</p>
                        <p class="">{{ __("Level:") }} {{ $course->level }}</p>
                    </div>

                    <form action="{{ route('courses.destroy', $course) }}" method="POST" class="mt-6">
                        @csrf
                        @method('delete')

                        <div class="flex items-center justify-start space-x-4">
                            <a href="{{ route('courses.index') }}"
                               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                <i class="fa fa-arrow-left mr-2"></i> {{ __("Cancel") }}
                            </a>

                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                <i class="fa fa-trash mr-2"></i> {{ __("Delete Course") }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
