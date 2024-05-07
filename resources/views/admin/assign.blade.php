<x-admin-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden  flex space-x-4">
                <div class="p-6 text-gray-900 bg-gray-400 shadow-sm sm:rounded-lg">
                   <div class="text-sm "><a href="{{ route('admin.assignRoles.index') }}" class="bg-gray-400 px-4 py-1.5 mt-1 text-white rounded-md">Assigned Roles</a></div>                          
                </div>
                <div class="p-6 text-gray-900 bg-gray-400 shadow-sm sm:rounded-lg">
                   <div class="text-sm "><a href="{{ route('admin.assignPermissions.index') }}" class="bg-gray-400 px-4 py-1.5 mt-1 text-white rounded-md">Assigned Permissions</a></div>                          
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>