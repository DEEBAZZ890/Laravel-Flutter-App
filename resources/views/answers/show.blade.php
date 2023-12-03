<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Answer Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(isset($answer))
                        <h3 class="font-bold text-gray-700 text-lg mb-4">{{ __("Answer Details") }}</h3>
                        <div class="grid grid-cols-4">
                            <p class="">{{ __("Content") }}</p>
                            <p class="p-2 col-span-3">{{ $answer->content }}</p>
                            <p class="">{{ __("Correct") }}</p>
                            <p class="p-2 col-span-3">{{ $answer->is_correct ? 'Yes' : 'No' }}</p>
                            <p class="">{{ __("Question ID") }}</p>
                            <p class="p-2 col-span-3">{{ $answer->question->id }}</p>
                            <p class="">{{ __("Related Question") }}</p>
                            <p class="p-2 col-span-3">{{ $answer->question->content }}</p>
                            <p class="">{{ __("Related Quiz") }}</p>
                            <p class="p-2 col-span-3">{{ $answer->question->quiz->title }} (ID: {{ $answer->question->quiz->id }})</p>
                        </div>
                    @else
                        <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                            <i class="fa fa-exclamation-triangle text-xl pl-2 pr-4"></i>
                            This answer does not exist.
                        </div>
                    @endif
                    <form action=""
                          class="mt-6 flex flex-row gap-4">
                        <a href="{{ route('answers.index') }}"
                           class="py-2 px-4 mx-2 w-1/6 text-center
                                  rounded border border-stone-600
                                  hover:bg-stone-600
                                  text-stone-600 hover:text-white
                                  transition duration-500">
                            <i class="fa fa-circle-left"></i> {{ __("Back") }}
                        </a>
                        @if(isset($answer))
                            <a href="{{ route('answers.edit', compact('answer')) }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center
                                      rounded border border-sky-600
                                      hover:bg-sky-600
                                      text-sky-600 hover:text-white
                                      transition duration-500">
                                <i class="fa fa-pen"></i> {{ __("Edit") }}
                            </a>
                            <a href="{{ route('answers.delete', compact('answer')) }}"
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
