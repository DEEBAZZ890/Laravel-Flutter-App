<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-bold text-gray-700 text-lg mb-4">{{ __("Quiz Details") }}</h3>
                    <div class="grid grid-cols-4">
                        <p class="">{{ __("Title") }}</p>
                        <p class="p-2 col-span-3">{{ $quiz->title }}</p>
                        <p class="">{{ __("Description") }}</p>
                        <p class="p-2 col-span-3">{{ $quiz->description }}</p>
                        <p class="">{{ __("Total Questions") }}</p>
                        <p class="p-2 col-span-3">{{ $quiz->total_questions }}</p>
                        <p class="">{{ __("Active Status") }}</p>
                        <p class="p-2 col-span-3">{{ $quiz->active_status ? 'Active' : 'Inactive' }}</p>
                        <p class="">{{ __("Published") }}</p>
                        <p class="p-2 col-span-3">{{ $quiz->is_published ? 'Yes' : 'No' }}</p>
                        <p class="">{{ __("Course") }}</p>
                        <p class="p-2 col-span-3">{{ $quiz->course->name }}</p>

                        <div class=""></div>
                        <form action=""
                              class="mt-6 col-span-3 flex flex-row gap-4">
                            <a href="{{ route('quizzes.index') }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center
                                      rounded border border-stone-600
                                      hover:bg-stone-600
                                      text-stone-600 hover:text-white
                                      transition duration-500">
                                <i class="fa fa-circle-left"></i> {{ __("Back") }}
                            </a>
                            <a href="{{ route('quizzes.edit', ['quiz' => $quiz->id]) }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center
                                      rounded border border-sky-600
                                      hover:bg-sky-600
                                      text-sky-600 hover:text-white
                                      transition duration-500">
                                <i class="fa fa-pen"></i> {{ __("Edit") }}
                            </a>
                            <a href="{{ route('quizzes.delete', ['quiz' => $quiz->id]) }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center
                                       rounded border border-red-600
                                       hover:bg-red-600
                                       text-red-600 hover:text-white
                                       transition duration-500">
                                <i class="fa fa-trash"></i> {{ __("Delete") }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
