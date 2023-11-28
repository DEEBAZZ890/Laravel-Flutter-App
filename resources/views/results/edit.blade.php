<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Result') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(isset($result))
                        <h3 class="font-bold text-gray-700 text-lg mb-4">
                            {{ __("Edit Result") }}
                        </h3>

                        @if($errors->any())
                            <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                                <i class="fa fa-exclamation-triangle text-xl pl-2 pr-4"></i>
                                You have errors in your form submission.
                            </div>
                        @endif

                        <form action="{{ route('results.update', $result->id) }}"
                              method="post"
                              class="flex flex-col gap-4">
                            @csrf
                            @method('patch')

                            <div class="grid grid-cols-6 gap-1">
                                <label for="Score" class="">{{ __("Score") }}</label>
                                <input type="number"
                                       id="Score" name="score"
                                       value="{{ old("score") ?? $result->score }}"
                                       class="p-2 col-span-5">
                                @error('score')
                                <span></span>
                                <p class="text-red-800 mb-2 text-sm col-span-5">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-6 gap-1">
                                <label for="Passed" class="">{{ __("Passed") }}</label>
                                <select id="Passed" name="passed" class="p-2 col-span-5">
                                    <option value="1" {{ $result->passed ? 'selected' : '' }}>{{ __("Yes") }}</option>
                                    <option value="0" {{ !$result->passed ? 'selected' : '' }}>{{ __("No") }}</option>
                                </select>
                                @error('passed')
                                <span></span>
                                <p class="text-red-800 mb-2 text-sm col-span-5">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-6 gap-1">
                                <label for="Feedback" class="">{{ __("Feedback") }}</label>
                                <textarea id="Feedback" name="feedback"
                                          class="p-2 col-span-5">{{ old("feedback") ?? $result->feedback }}</textarea>
                                @error('feedback')
                                <span></span>
                                <p class="text-red-800 mb-2 text-sm col-span-5">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-6 gap-4">
                                <span></span>
                                <div class="mt-6 col-span-5 flex flex-row gap-4 -ml-2">
                                    <a href="{{ route('results.index') }}"
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
                            This result does not exist.
                        </div>

                        <div class="mt-6 col-span-5 flex flex-row gap-4 -ml-2">
                            <a href="{{ route('results.index') }}"
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
