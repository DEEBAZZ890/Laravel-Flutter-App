<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(isset($question))
                        <form action="{{ route('questions.update', $question->id) }}"
                              method="POST"
                              class="flex flex-col gap-4">
                            @csrf
                            @method('PATCH')

                            <div class="grid grid-cols-6 gap-4">
                                <label for="quiz_id" class="col-span-1">{{ __("Quiz") }}</label>
                                <select id="quiz_id" name="quiz_id" class="p-2 col-span-5">
                                    @foreach($quizzes as $quiz)
                                        <option value="{{ $quiz->id }}"
                                                @if($quiz->id == $question->quiz_id) selected @endif>
                                            {{ $quiz->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="grid grid-cols-6 gap-4">
                                <label for="content" class="col-span-1">{{ __("Content") }}</label>
                                <textarea id="content" name="content" class="p-2 col-span-5">{{ $question->content }}</textarea>
                            </div>

                            <div class="grid grid-cols-6 gap-4">
                                <label for="type" class="col-span-1">{{ __("Type") }}</label>
                                <input type="text" id="type" name="type" class="p-2 col-span-5" value="{{ $question->type }}">
                            </div>

                            <div class="grid grid-cols-6 gap-4">
                                <label for="points" class="col-span-1">{{ __("Points") }}</label>
                                <input type="number" id="points" name="points" class="p-2 col-span-5" value="{{ $question->points }}">
                            </div>

                            <div class="flex justify-end mt-4">
                                <a href="{{ route('questions.index') }}"
                                   class="mx-2 btn btn-secondary">
                                    {{ __("Cancel") }}
                                </a>
                                <button type="submit" class="mx-2 btn btn-primary">
                                    {{ __("Update") }}
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                            <i class="fa fa-exclamation-triangle text-xl pl-2 pr-4"></i>
                            This question does not exist.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
