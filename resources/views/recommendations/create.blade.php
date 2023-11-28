<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Recommendation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-bold text-gray-700 text-lg mb-4">
                        {{ __("Create New Recommendation") }}
                    </h3>

                    @if($errors->any())
                        <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                            <i class="fa fa-triangle-exclamation text-xl pl-2 pr-4"></i>
                            You have errors in your form submission.
                        </div>
                    @endif

                    <form action="{{ route('recommendations.store') }}"
                          class="flex flex-col gap-4"
                          method="post">

                        @csrf

                        <div class="grid grid-cols-6 gap-1">
                            <label for="result_id" class="">{{ __("Result ID") }}</label>
                            <input id="result_id" name="result_id" type="number"
                                   class="p-2 col-span-5"
                                   value="{{ old('result_id') }}">
                            @error('result_id')
                            <p class="text-red-800 mb-2 text-sm col-span-5">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-6 gap-1">
                            <label for="content" class="">{{ __("Content") }}</label>
                            <textarea id="content" name="content"
                                      class="p-2 col-span-5 h-24"
                            >{{ old('content') }}</textarea>
                            @error('content')
                            <p class="text-red-800 mb-2 text-sm col-span-5">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-6 gap-1">
                            <label for="action_link" class="">{{ __("Action Link") }}</label>
                            <input id="action_link" name="action_link" type="text"
                                   class="p-2 col-span-5"
                                   value="{{ old('action_link') }}">
                            @error('action_link')
                            <p class="text-red-800 mb-2 text-sm col-span-5">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-6 gap-4">
                            <span></span>
                            <div class="mt-6 col-span-5 flex flex-row gap-4 -ml-2">
                                <a href="{{ route('recommendations.index') }}"
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
                                    <i class="fa fa-save"></i> {{ __("Save Recommendation") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
