<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Tierlist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <h1 class="mb-6 text-2xl font-medium text-gray-900 dark:text-white">
                        {{ __('Edit Tierlist') }}
                    </h1>

                    <form method="post" action="{{ route('tierlists.update', $tierlist) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-6">
                            <label class="block text-gray-500 dark:text-gray-400 leading-relaxed mb-2" for="slug">Slug <span class="italic text-sm text-gray-400 dark:text-gray-600">(parsed to url)</span></label>
                            <input value="{{$tierlist->slug}}" class="inputslug rounded-[10px] block form-control" type="text" name="slug" id="slug">

                            <label class="block mt-6 text-gray-500 dark:text-gray-400 leading-relaxed mb-2" for="title">Title</label>
                            <input value="{{$tierlist->title}}" class="rounded-[10px] block form-control" type="text" name="title" id="title">

                            <label class="block mt-6 text-gray-500 dark:text-gray-400 leading-relaxed mb-2" for="description">Description</label>
                            <textarea class="rounded-[10px] block form-control" name="description" id="description" cols="30" rows="10">{{$tierlist->description}}</textarea>

                            <label class="block mt-6 text-gray-500 dark:text-gray-400 leading-relaxed" for="format">Format <span class="text-white">{{$tierlist->format}}</span></label>

                            <fieldset class="mb-6 text-white">
                                <legend class="block mt-6 text-gray-500 dark:text-gray-400 leading-relaxed mb-2">Categories</legend>
                                @if (!empty($categories) && count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <div>
                                            <input type="checkbox" id="cat-{{ $category->id }}" name="categories[]" value="{{ $category->id }}" @if (in_array($category->id, $idCategories)) checked @endif />
                                            <label for="cat-{{ $category->id }}">{{ $category->title }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </fieldset>

                        </div>
                        <button type="submit" class="ease-in duration-300 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
