<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz Attempt Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(isset($quizAttempt))
                        <h3 class="font-bold text-gray-700 text-lg mb-4">{{ __("Quiz Attempt Details") }}</h3>
                        <div class="grid grid-cols-4">
                            <p class="">{{ __("User") }}</p>
                            <p class="p-2 col-span-3">{{ $quizAttempt->user->name }}</p>
                            <p class="">{{ __("Quiz") }}</p>
                            <p class="p-2 col-span-3">{{ $quizAttempt->quiz->title }}</p>
                            <p class="">{{ __("Attempt Number") }}</p>
                            <p class="p-2 col-span-3">{{ $quizAttempt->attempt_number }}</p>
                            <p class="">{{ __("Score") }}</p>
                            <p class="p-2 col-span-3">{{ $quizAttempt->score }}</p>
                            <p class="">{{ __("Completed At") }}</p>
                            <p class="p-2 col-span-3">{{ $quizAttempt->completed_at }}</p>
                        </div>
                    @else
                        <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                            <i class="fa fa-exclamation-triangle text-xl pl-2 pr-4"></i>
                            This quiz attempt does not exist.
                        </div>
                    @endif
                    <form action=""
                          class="mt-6 flex flex-row gap-4">
                        <a href="{{ route('quizAttempts.index') }}"
                           class="py-2 px-4 mx-2 w-1/6 text-center
                                  rounded border border-stone-600
                                  hover:bg-stone-600
                                  text-stone-600 hover:text-white
                                  transition duration-500">
                            <i class="fa fa-circle-left"></i> {{ __("Back") }}
                        </a>
                        @if(isset($quizAttempt))
                            <a href="{{ route('quizAttempts.edit', compact('quizAttempt')) }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center
                                      rounded border border-sky-600
                                      hover:bg-sky-600
                                      text-sky-600 hover:text-white
                                      transition duration-500">
                                <i class="fa fa-pen"></i> {{ __("Edit") }}
                            </a>
                            <a href="{{ route('quizAttempts.delete', compact('quizAttempt')) }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center
                                       rounded border border-red-600
                                       hover:bg-red-600
                                       text-red-600 hover:text-white
                                       transition duration-500">
                                <i class="fa fa-trash"></i> {{ __("Delete") }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
