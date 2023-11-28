<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Quiz Attempt') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(isset($quizAttempt))
                        <h3 class="font-bold text-gray-700 text-lg mb-4">
                            {{ __("Edit Quiz Attempt") }}
                        </h3>

                        @if($errors->any())
                            <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                                <i class="fa fa-exclamation-triangle text-xl pl-2 pr-4"></i>
                                You have errors in your form submission.
                            </div>
                        @endif

                        <form action="{{ route('quizAttempts.update', $quizAttempt->id) }}"
                              method="post"
                              class="flex flex-col gap-4">
                            @csrf
                            @method('patch')

                            <!-- User Selection -->
                            <div class="grid grid-cols-6 gap-1">
                                <label for="user_id" class="">{{ __("User") }}</label>
                                <select id="user_id" name="user_id" class="p-2 col-span-5">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $quizAttempt->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <p class="text-red-800 mb-2 text-sm col-span-5">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Quiz Selection -->
                            <div class="grid grid-cols-6 gap-1">
                                <label for="quiz_id" class="">{{ __("Quiz") }}</label>
                                <select id="quiz_id" name="quiz_id" class="p-2 col-span-5">
                                    @foreach($quizzes as $quiz)
                                        <option value="{{ $quiz->id }}"
                                            {{ $quizAttempt->quiz_id == $quiz->id ? 'selected' : '' }}>
                                            {{ $quiz->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('quiz_id')
                                <p class="text-red-800 mb-2 text-sm col-span-5">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Other Fields as needed for QuizAttempt -->

                            <div class="grid grid-cols-6 gap-4">
                                <span></span>
                                <div class="mt-6 col-span-5 flex flex-row gap-4 -ml-2">
                                    <a href="{{ route('quizAttempts.index') }}"
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
                                        <i class="fa fa-save"></i> {{ __("Save") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                            <i class="fa fa-exclamation-triangle text-xl pl-2 pr-4"></i>
                            This quiz attempt does not exist.
                        </div>

                        <div class="mt-6 col-span-5 flex flex-row gap-4 -ml-2">
                            <a href="{{ route('quizAttempts.index') }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center
                                      rounded border border-stone-600
                                      hover:bg-stone-600
                                      text-stone-600 hover:text-white
                                      transition duration-500">
                                <i class="fa fa-circle-left"></i> {{ __("Back") }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
