<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <h1 class="mb-1 text-2xl font-medium text-gray-900 dark:text-white">
                        {{ __('User') }} : {{$user->name}}
                    </h1>
                    <span class="by block mb-4 text-gray-800 dark:text-white/50">{{$user->email}}</span>

                    @if ($user->tierlists)
                        <h2 class="block text-gray-800 dark:text-white">User's Tierlists</h2>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($user->tierlists as $tierlist)
                                    <li><a class="text-orange-400 font-i" href="{{ route('tierlists.edit', $tierlist->id) }}">{{ $tierlist->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
