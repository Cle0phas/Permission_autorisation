<x-admin-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
     @if (session('success'))
        <span class="bg-green-400 h-20 rounded-md text-center py-2">{{ session('success') }}</span>
    @endif

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900 h-18 flex">
                    <div class="flex-grow">ROLE NAME</div>
                    <div class="justify-end"> <a href="{{route('admin.roles.create')  }}" class="bg-gray-300 p-2 rounded-md">create</a> </div>
                </div>
                <hr>
                @foreach ($roles as $role )
                    
                <div class="flex items-center h-18 p-2 border-b border-gray-200">
    
                    <div class="flex w-full">
                        <div class="flex-grow">
                           {{ $role->name }} 
                        </div>
                        <div class="justify-end flex space-x-2 items-center">
                            <div class="text-sm text-gray-500  "><a href="{{ route('admin.roles.edit',$role->id) }}" class="bg-blue-600 px-4 py-1.5 mt-1 text-white rounded-md">Edit</a></div>
                            <div class="text-sm text-gray-500  ">
                                <form action="{{ route('admin.roles.destroy',$role->id) }}" method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer ce role ?');"> 
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" name="" value="Delete" class="bg-red-600 px-2 py-1 text-white rounded-md">
                                </form>
                            </div>                 
                            
                        </div>
                    </div>                   
                   
                </div>

                 @endforeach
    
</div>

</div>
</div>


            </div>
        </div>
    </div>
</x-admin-layout>
