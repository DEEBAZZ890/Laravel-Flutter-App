<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('questions.store') }}"
                          method="POST"
                          class="flex flex-col gap-4">
                        @csrf

                        <div class="grid grid-cols-6 gap-4">
                            <label for="quiz_id" class="col-span-1">{{ __("Quiz") }}</label>
                            <select id="quiz_id" name="quiz_id" class="p-2 col-span-5">
                                @foreach($quizzes as $quiz)
                                    <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-6 gap-4">
                            <label for="content" class="col-span-1">{{ __("Content") }}</label>
                            <textarea id="content" name="content" class="p-2 col-span-5"></textarea>
                        </div>

                        <div class="grid grid-cols-6 gap-4">
                            <label for="type" class="col-span-1">{{ __("Type") }}</label>
                            <input type="text" id="type" name="type" class="p-2 col-span-5">
                        </div>

                        <div class="grid grid-cols-6 gap-4">
                            <label for="points" class="col-span-1">{{ __("Points") }}</label>
                            <input type="number" id="points" name="points" class="p-2 col-span-5">
                        </div>

                        <div class="flex justify-end mt-4">
                            <a href="{{ route('questions.index') }}"
                               class="mx-2 btn btn-secondary">
                                {{ __("Cancel") }}
                            </a>
                            <button type="submit" class="mx-2 btn btn-primary">
                                {{ __("Save") }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
