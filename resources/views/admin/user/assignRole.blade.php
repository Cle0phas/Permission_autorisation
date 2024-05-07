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
                    <div class="flex-grow">ASSIGN ROLE TO USER</div>
                    <div class="justify-end"> <a href="{{route('admin.index')  }}" class="bg-gray-300 p-2 rounded-md">User Index</a> </div>
                </div>
                <hr>

                
                    
                <div class="flex items-center h-25 p-2 border-b border-gray-200">
                  
                    <form action="{{ route('admin.userInfos.update',$cur_user->id) }}" method="POST" class="w-full">
                        @csrf
                        @method('PUT')
                        <div class="flex w-full">
                            <div>
                                <input type="hidden" name="methode" value="add">
                            </div>
                            <div class="flex-grow ">                           
                                <p class="items-center py-2 text-center">
                                    Assigned
                                </p>                                     
                            </div>
                            <div class="flex-grow">
                                <select class="shadow appearance-none  border-none rounded w-full py-2 px-3 mr-6 text-gray-700  focus:outline-none focus:shadow-outline" name="role" id="">
                                    
                                    @foreach ($roles as $role )
                                        <option value={{$role->name}} >{{ $role->name }} </option>
                                    @endforeach
                                </select>                                                                   
                            </div>
                            <div class="flex-grow ">
                            <p class="items-center py-2 text-center">
                                    to
                                </p>                                                                    
                            </div><div class="flex-grow"> 
                                
                                <select class="shadow appearance-none  border-none rounded w-full py-2 px-3 mr-6 text-gray-700  focus:outline-none focus:shadow-outline" name="user" id="">                           
            
                                    <option value="{{ $cur_user->id }} " selected>{{ $cur_user->name }} </option>
                                   
                                </select>                                                                  
                            </div>
                            
                            <div class="justify-end items-center ml-6">               
                                <input type="submit" value="Validated" class="shadow appearance-none  border-none rounded w-full py-2 px-3 mr-6 text-gray-700  focus:outline-none focus:shadow-outline bg-green-400">
                            </div>
                        </div>
                    </form>
                                       
                   
                </div>
                
    
</div>

</div>
</div>


            </div>
        </div>
    </div>
</x-admin-layout>
