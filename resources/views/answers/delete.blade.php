{{-- resources/views/answers/delete.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Delete Answer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-bold text-gray-700 text-lg mb-4">
                        {{ __("Are you sure you want to delete this answer?") }}
                    </h3>
                    <p class="text-red-500 mb-4">
                        {{ __("Warning: Deleting this answer will remove it permanently.") }}
                    </p>

                    <div class="flex flex-col">
                        <p class="">{{ __("Answer Content:") }} {{ $answer->content }}</p>
                        <p class="">{{ __("Question:") }} {{ $answer->question->content }}</p>
                        <p class="">{{ __("Is Correct:") }} {{ $answer->is_correct ? 'Yes' : 'No' }}</p>
                    </div>

                    <form action="{{ route('answers.destroy', $answer) }}" method="POST" class="mt-6">
                        @csrf
                        @method('delete')

                        <div class="flex items-center justify-start space-x-4">
                            <a href="{{ route('answers.index') }}"
                               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                <i class="fa fa-arrow-left mr-2"></i> {{ __("Cancel") }}
                            </a>

                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                <i class="fa fa-trash mr-2"></i> {{ __("Delete Answer") }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
