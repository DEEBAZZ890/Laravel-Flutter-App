{{-- resources/views/courses/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-bold text-gray-700 text-lg mb-4">{{ __("Course Details") }}</h3>
                    <div class="grid grid-cols-4">
                        <p class="">{{ __("Name") }}</p>
                        <p class="p-2 col-span-3">{{ $course->name }}</p>
                        <p class="">{{ __("Description") }}</p>
                        <p class="p-2 col-span-3">{{ $course->description }}</p>
                        <p class="">{{ __("Level") }}</p>
                        <p class="p-2 col-span-3">{{ $course->level }}</p>
                        <p class="">{{ __("Published Status") }}</p>
                        <p class="p-2 col-span-3">{{ $course->is_published ? 'Published' : 'Not Published' }}</p>
                        <p class="">{{ __("Quizzes") }}</p>
                        <ul class="col-span-3 list-disc list-inside">
                            @foreach($course->quizzes as $quiz)
                                <li>{{ $quiz->title }}</li>
                            @endforeach
                        </ul>
                        <div class=""></div>
                        <form action=""
                              class="mt-6 col-span-3 flex flex-row gap-4">
                            <a href="{{ route('courses.index') }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center
                                      rounded border border-stone-600
                                      hover:bg-stone-600
                                      text-stone-600 hover:text-white
                                      transition duration-500">
                                <i class="fa fa-circle-left"></i> {{ __("Back") }}
                            </a>
                            <a href="{{ route('courses.edit', ['course' => $course->id]) }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center
                                      rounded border border-sky-600
                                      hover:bg-sky-600
                                      text-sky-600 hover:text-white
                                      transition duration-500">
                                <i class="fa fa-pen"></i> {{ __("Edit") }}
                            </a>
                            <a href="{{ route('courses.delete', ['course' => $course->id]) }}"
                               class="py-2 px-4 mx-2 w-1/6 text-center
                                       rounded border border-red-600
                                       hover:bg-red-600
                                       text-red-600 hover:text-white
                                       transition duration-500">
                                <i class="fa fa-trash"></i> {{ __("Delete") }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
