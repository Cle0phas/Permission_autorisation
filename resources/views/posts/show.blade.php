<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="flex justify-center items-center flex-wrap mt-6">
                        <div class="bg-gray-200 w-3/4 sm:rounded-lg p-4 mb-6 inline-block">
                                <div class="text-right mr-2 ">
                                    {{ $post->user->name }}
                                </div>
                                <div class="p-1 text-xl">
                                    {{ $post->name }}
                                </div>
                                <div class="p-1">
                                    {{ $post->contenu }}
                                </div>
                                <div>
                                    
                                    <div class="mt-3">   
                                        @if (Auth::user()->can('update', $post))
                                            <a href="{{ route('posts.edit',$post->id) }}" class="bg-green-400 p-1 sm:rounded-lg">Modifier</a>
                                        @endif
                                    </div>

                                </div>
                                
                        </div>
              
                </div>

            </div>
        </div>
    </div>
</x-app-layout>