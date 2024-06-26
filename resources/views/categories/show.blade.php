<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <h1 class="mb-6 text-2xl font-medium text-gray-900 dark:text-white">
                        {{ __('Category') }} : {{$category->title}}
                    </h1>

                    <div class="categories block mb-8">
                        @if(!empty($category->tierlists) && count($category->tierlists) > 0)
                            <h2 class="by block mb-4 text-gray-800 dark:text-white">{{ __('Tierlists related') }}</h2>
                            @foreach($category->tierlists as $tierlist)
                                <a href="{{ route('tierlists.show', $tierlist->id) }}" class="mr-2 hover:text-orange-800 text-orange-400 font-bold">{{ $tierlist->title }}</a>
                            @endforeach
                        @else
                            <h2 class="by block mb-4 text-gray-800 dark:text-white">{{ __('No tierlists for this category') }}</h2>
                        @endif
                    </div>

                    <div class="mb-10 bg-white border-2 border-black-300 p-6 rounded">{!! $category->description !!}</div>

                    <a href="{{ route('categories.edit', $category->id) }}" class="mr-2 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
