<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Delete Quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(isset($quiz))
                        <h3 class="font-bold text-gray-700 text-lg mb-4">{{ __("Delete Quiz") }}</h3>
                        <div class="grid grid-cols-4">
                            <p class="">{{ __("Title") }}</p>
                            <p class="p-2 col-span-3">{{ $quiz->title }}</p>
                            <p class="">{{ __("Course") }}</p>
                            <p class="p-2 col-span-3">{{ $quiz->course->name }}</p>
                            <p class="">{{ __("Description") }}</p>
                            <p class="p-2 col-span-3">{{ $quiz->description }}</p>
                            <p class="">{{ __("Total Questions") }}</p>
                            <p class="p-2 col-span-3">{{ $quiz->total_questions }}</p>
                        </div>
                    @else
                        <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                            <i class="fa fa-exclamation-triangle text-xl pl-2 pr-4"></i>
                            This quiz does not exist.
                        </div>
                    @endif
                    <form action="{{ route('quizzes.destroy', $quiz ? ['quiz' => $quiz->id] : '') }}" method="POST" class="mt-6 flex flex-row gap-4">
                        @csrf
                        @method('delete')
                        <a href="{{ route('quizzes.index') }}" class="py-2 px-4 mx-2 w-1/6 text-center rounded border border-stone-600 hover:bg-stone-600 text-stone-600 hover:text-white transition duration-500">
                            <i class="fa fa-circle-left"></i> {{ __("Back") }}
                        </a>
                        @if(isset($quiz))
                            <button type="submit" class="py-2 px-4 mx-2 w-1/6 text-center rounded border border-red-600 hover:bg-red-600 text-red-600 hover:text-white transition duration-500">
                                <i class="fa fa-trash"></i> {{ __("Confirm Delete") }}
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
