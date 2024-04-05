<div class="row mb-4 ease-in duration-100 rounded-[10px] hover:p-2 hover:pl-4 hover:bg-gray-100 dark:hover:bg-gray-600">
    <div class="flex">
        <div class="id flex items-center flex-none w-10 font-medium text-gray-900 dark:text-white">{{$tierlist->id}}</div>
        <div class="name flex items-center w-5 text-left flex-auto font-medium text-gray-900 dark:text-white">{{$tierlist->title}}</div>
        <div class="actions flex flex-none ">
            <a href="{{ route('tierlists.edit', $tierlist->id) }}" class="mr-2 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Edit</a>
            <form action="{{ route('tierlists.destroy', $tierlist->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure to delete this tierlist : {{$tierlist->title}} ?')" class="ease-in duration-300 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            </form>
        </div>
    </div>
</div>
