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
                    <div class="flex-grow">PERMISSION(S) ASSIGNED TO ROLE</div>
                    <div class="justify-end"> <a href="{{route('admin.assignPermissions.create')}}" class="bg-gray-300 p-2 rounded-md">Create</a> </div>
                </div>
                <hr>
                    
                <div class="flex items-center h-18 p-2 border-b border-gray-200">
    
                    <div class="flex w-full">
                        <div class="flex-grow">
                           {{ $role->name }} 
                        </div>

                        <div class="justify-end flex space-x-2 items-center">
                            <div class="text-sm text-gray-500">
                                @foreach ($role->permissions as $role_permission)
                                    <div class="flex space-x-2">
                                        <div>
                                            {{ $role_permission->name }}
                                        </div>  
                                        
                                        <div class="w-10">
                                            @php
                                                $a = $role->id;
                                                $b = $role_permission->id;
                                                $assignPermission = $a . "§" . $b;
                                            @endphp 
                                            <form action="{{ route('admin.assignPermissions.destroy', $assignPermission) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette permission à cet utilisateur ?');"> 
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="X" class="ml-4 p-1 text-red-800 text-bold">
                                            </form>
                                        </div>
                                    </div>
                                @endforeach  
                            </div>                           
                        </div>
                    </div>                   
                   
                </div>
                
            </div>
        </div>
    </div>
</x-admin-layout>
