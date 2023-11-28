<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recommendation Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(isset($recommendation))
                        <h3 class="font-bold text-gray-700 text-lg mb-4">{{ __("Recommendation Details") }}</h3>
                        <div class="grid grid-cols-4">
                            <p class="">{{ __("Result ID") }}</p>
                            <p class="p-2 col-span-3">{{ $recommendation->result_id }}</p>
                            <p class="">{{ __("Content") }}</p>
                            <p class="p-2 col-span-3">{{ $recommendation->content }}</p>
                            <p class="">{{ __("Action Link") }}</p>
                            <p class="p-2 col-span-3">{{ $recommendation->action_link }}</p>
                        </div>
                    @else
                        <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                            <i class="fa fa-exclamation-triangle text-xl pl-2 pr-4"></i>
                            This recommendation does not exist.
                        </div>
                    @endif
                    <form action=""
                          class="mt-6 flex flex-row gap-4">
                        <a href="{{ route('recommendations.index') }}"
                           class="py-2 px-4 mx-2 w-1/6 text-center
                                  rounded border border-stone-600
                                  hover:bg-stone-600
                                  text-stone-600 hover:text-white
                                  transition duration-500">
                            <i class="fa fa-circle-left"></i> {{ __("Back") }}
                        </a>
                        @if(isset($recommendation))
                            <a href="{{ route('recommendations.edit', compact('recommendation')) }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center
                                      rounded border border-sky-600
                                      hover:bg-sky-600
                                      text-sky-600 hover:text-white
                                      transition duration-500">
                                <i class="fa fa-pen"></i> {{ __("Edit") }}
                            </a>
                            <a href="{{ route('recommendations.delete', compact('recommendation')) }}"
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
