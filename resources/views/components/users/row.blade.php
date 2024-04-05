<div class="row mb-4 rounded-[10px] hover:p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
    <div class="flex">
        <div class="id flex-none w-10 font-medium text-gray-900 dark:text-white">{{$user->id}}</div>
        <div class="name w-5 text-left flex-auto font-medium text-gray-900 dark:text-white">{{$user->name}}</div>
        <div class="email w-5 text-left flex-auto font-medium text-gray-900 dark:text-white">{{$user->email}}</div>
        <div class="actions flex flex-none ">
            <a href="#" class="mr-2 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Edit</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure to delete the user : {{$user->name}}?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            </form>
        </div>
    </div>
</div>
