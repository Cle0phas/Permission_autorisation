<x-admin-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                
                <div class="p-2 text-gray-900 h-18 flex">
                    <div class="flex-grow">CREATE ROLE</div>
                    <div class="justify-end"> <a href="{{route('admin.roles.index')  }}" class="bg-green-700 p-2 rounded-md">role index</a> </div>
                </div>
                <hr>            
                <div class="flex items-center h-18 p-2 border-b  w-full">
                    
                    {{-- shadow-md  --}}
                    <form class="bg-white rounded w-full px-8 pt-6 pb-8 mb-4" action="{{ route('admin.roles.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Nom
                            </label>
                            <input class="shadow appearance-none  border-none rounded w-full py-2 px-3 mr-6 text-gray-700  focus:outline-none focus:shadow-outline" name="name" id="name" type="text" placeholder="Nom">
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value=" Create">                         
                        </div>
                    </form>
                </div>

                   
            </div>
    
        </div>

    </div>

</x-admin-layout>
