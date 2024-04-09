<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tierlist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <h1 class="mb-1 text-2xl font-medium text-gray-900 dark:text-white">
                        {{ __('Tierlist') }} : {{$tierlist->title}}
                    </h1>
                    <span class="by block mb-4 text-gray-800 dark:text-white/50">{{$tierlist->user->name}}</span>

                    <div class="categories block mb-8">
                        @if(!empty($tierlist->categories) && count($tierlist->categories) > 0)
                            <h2 class="by block mb-4 text-gray-800 dark:text-white">{{ __('Categories') }}</h2>
                            @foreach($tierlist->categories as $category)
                                <a href="{{ route('categories.show', $category->id) }}" class="mr-2 hover:text-orange-800 text-orange-400 font-bold">{{ $category->title }}</a>
                            @endforeach
                        @else
                            <h2 class="by block mb-4 text-gray-800 dark:text-white">{{ __('No categories for tierlist') }}</h2>
                        @endif
                    </div>

                    <div class="mb-10 bg-white border-2 border-black-300 p-6 rounded">{!! $tierlist->description !!}</div>

                    <a href="{{ route('tierlists.edit', $tierlist->id) }}" class="mr-2 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
