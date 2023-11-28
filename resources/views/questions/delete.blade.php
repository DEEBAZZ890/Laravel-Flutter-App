<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Delete Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(isset($question))
                        <h3 class="font-bold text-gray-700 text-lg mb-4">{{ __("Delete Question") }}</h3>
                        <div class="grid grid-cols-4">
                            <p class="">{{ __("Quiz") }}</p>
                            <p class="p-2 col-span-3">{{ $question->quiz->title }}</p>
                            <p class="">{{ __("Content") }}</p>
                            <p class="p-2 col-span-3">{{ $question->content }}</p>
                            <p class="">{{ __("Type") }}</p>
                            <p class="p-2 col-span-3">{{ $question->type }}</p>
                            <p class="">{{ __("Points") }}</p>
                            <p class="p-2 col-span-3">{{ $question->points }}</p>
                        </div>

                        <form action="{{ route('questions.destroy', $question->id) }}"
                              method="POST"
                              class="mt-6 flex flex-row gap-4">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('questions.index') }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center
                                      rounded border border-stone-600
                                      hover:bg-stone-600
                                      text-stone-600 hover:text-white
                                      transition duration-500">
                                <i class="fa fa-circle-left"></i> {{ __("Back") }}
                            </a>

                            <button type="submit"
                                    class="py-2 px-4 mx-2 w-1/6 text-center
                                           rounded border border-red-600
                                           hover:bg-red-600
                                           text-red-600 hover:text-white
                                           transition duration-500">
                                <i class="fa fa-trash"></i> {{ __("Confirm Delete") }}
                            </button>
                        </form>
                    @else
                        <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                            <i class="fa fa-exclamation-triangle text-xl pl-2 pr-4"></i>
                            This question does not exist.
                        </div>

                        <a href="{{ route('questions.index') }}"
                           class="py-2 px-4 mx-2 w-1/6 text-center
                                  rounded border border-stone-600
                                  hover:bg-stone-600
                                  text-stone-600 hover:text-white
                                  transition duration-500">
                            <i class="fa fa-circle-left"></i> {{ __("Back") }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
