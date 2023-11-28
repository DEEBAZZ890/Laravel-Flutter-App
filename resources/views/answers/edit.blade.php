<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Answer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(isset($answer))
                        <h3 class="font-bold text-gray-700 text-lg mb-4">
                            {{ __("Edit Answer") }}
                        </h3>

                        @if($errors->any())
                            <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                                <i class="fa fa-exclamation-triangle text-xl pl-2 pr-4"></i>
                                You have errors in your form submission.
                            </div>
                        @endif

                        <form action="{{ route('answers.update', $answer->id) }}" method="post" class="flex flex-col gap-4">
                            @csrf
                            @method('patch')

                            <!-- Question Select Dropdown -->
                            <div class="grid grid-cols-6 gap-1">
                                <label for="question_id" class="">{{ __("Question") }}</label>
                                <select id="question_id" name="question_id" class="p-2 col-span-5">
                                    @foreach($questions as $question)
                                        <option value="{{ $question->id }}" @if($question->id == old('question_id', $answer->question_id)) selected @endif>
                                            {{ $question->content }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('question_id')
                                <p class="text-red-800 mb-2 text-sm col-span-5">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Answer Content -->
                            <div class="grid grid-cols-6 gap-1">
                                <label for="content" class="">{{ __("Content") }}</label>
                                <input id="content" name="content" type="text" class="p-2 col-span-5" value="{{ old('content', $answer->content) }}">
                                @error('content')
                                <p class="text-red-800 mb-2 text-sm col-span-5">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Is Correct Checkbox -->
                            <div class="grid grid-cols-6 gap-1">
                                <label for="is_correct" class="">{{ __("Correct Answer?") }}</label>
                                <input id="is_correct" name="is_correct" type="checkbox" class="p-2 col-span-5" @if(old('is_correct', $answer->is_correct)) checked @endif>
                                @error('is_correct')
                                <p class="text-red-800 mb-2 text-sm col-span-5">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Form Buttons -->
                            <div class="grid grid-cols-6 gap-4">
                                <span></span>
                                <div class="mt-6 col-span-5 flex flex-row gap-4 -ml-2">
                                    <a href="{{ route('answers.index') }}"
                                       class="py-2 px-4 mx-2 w-1/6 text-center rounded border border-stone-600 hover:bg-stone-600 text-stone-600 hover:text-white transition duration-500">
                                        <i class="fa fa-circle-left"></i> {{ __("Back") }}
                                    </a>
                                    <button type="submit"
                                            class="py-2 px-4 mx-2 w-1/6 text-center rounded border border-red-600 hover:bg-red-600 text-red-600 hover:text-white transition duration-500">
                                        <i class="fa fa-save"></i> {{ __("Save") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                            <i class="fa fa-exclamation-triangle text-xl pl-2 pr-4"></i>
                            Answer not found.
                        </div>
                        <div class="mt-6 col-span-5 flex flex-row gap-4 -ml-2">
                            <a href="{{ route('answers.index') }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center rounded border border-stone-600 hover:bg-stone-600 text-stone-600 hover:text-white transition duration-500">
                                <i class="fa fa-circle-left"></i> {{ __("Back") }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
