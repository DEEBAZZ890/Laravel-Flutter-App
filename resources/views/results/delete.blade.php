<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Delete Result') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(isset($result))
                        <h3 class="font-bold text-gray-700 text-lg mb-4">{{ __("Delete Result") }}</h3>
                        <div class="grid grid-cols-4">
                            <p class="">{{ __("Quiz Attempt ID") }}</p>
                            <p class="p-2 col-span-3">{{ $result->quiz_attempt_id }}</p>
                            <p class="">{{ __("User ID") }}</p>
                            <p class="p-2 col-span-3">{{ $result->user_id }}</p>
                            <p class="">{{ __("Score") }}</p>
                            <p class="p-2 col-span-3">{{ $result->score }}</p>
                            <p class="">{{ __("Passed") }}</p>
                            <p class="p-2 col-span-3">{{ $result->passed ? 'Yes' : 'No' }}</p>
                            <p class="">{{ __("Feedback") }}</p>
                            <p class="p-2 col-span-3">{{ $result->feedback }}</p>
                        </div>
                    @else
                        <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                            <i class="fa fa-exclamation-triangle text-xl pl-2 pr-4"></i>
                            This result does not exist.
                        </div>
                    @endif
                    <form action="{{ route('results.destroy', $result ? ['result' => $result->id] : '') }}"
                          method="POST"
                          class="mt-6 flex flex-row gap-4">
                        @csrf
                        @method('delete')
                        <a href="{{ route('results.index') }}"
                           class="py-2 px-4 mx-2 w-1/6 text-center
                                  rounded border border-stone-600
                                  hover:bg-stone-600
                                  text-stone-600 hover:text-white
                                  transition duration-500">
                            <i class="fa fa-circle-left"></i> {{ __("Back") }}
                        </a>
                        @if(isset($result))
                            <button type="submit"
                                    class="py-2 px-4 mx-2 w-1/6 text-center
                                           rounded border border-red-600
                                           hover:bg-red-600
                                           text-red-600 hover:text-white
                                           transition duration-500">
                                <i class="fa fa-trash"></i> {{ __("Confirm Delete") }}
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
