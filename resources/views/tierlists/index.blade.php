<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <h1 class="mb-6 text-2xl font-medium text-gray-900 dark:text-white">
                        {{ $title }}
                    </h1>
                    <a class="mr-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href={{ route('tierlists.create') }}>{{ $addTxt }}</a>

                    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed mb-10">
                        {!! $description !!}
                    </p>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success mb-10">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                     @if (count($tierlists) > 0)

                        <div class="row mb-4">
                            <div class="flex">
                                <div class="id flex items-center flex-none w-10 font-medium text-gray-900 dark:text-white">ID</div>
                                <div class="title flex items-center w-5 text-left flex-auto font-medium text-gray-900 dark:text-white">Title</div>
                                <div class="actions flex flex-center justify-end items-center text-right flex-auto font-medium text-gray-900 dark:text-white">Actions</div>
                            </div>
                        </div>

                         @foreach ($tierlists as $tierlist)
                             @include('components.tierlists.row')
                         @endforeach

                        {{ $tierlists->links() }}
                     @else
                         <p class="text-orange-400 font-i">→ {{ $noresults }}</p>
                     @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
