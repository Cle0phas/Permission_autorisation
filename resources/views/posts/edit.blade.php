
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
                <div  class="p-10 text-gray-900 ">
                    <h5 class="text-xl">Modifer un post</h5> <br>
                    <form action="{{ route('posts.update',$cur_post) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <label for="name">Nom</label>
                        <input type="text" name="name" class="block mt-1 w-full sm:rounded-lg w-1/2" value="{{ $cur_post->name }}">
                        @error('name') {{ $message }} @enderror
                    </div>
                    <div>
                        <label for="contenu">Contenu</label>
                        <textarea name="contenu" id="" cols="8" rows="3"class="block mt-1 w-full sm:rounded-lg w-1/2  mb-4" >{{ $cur_post->contenu }}</textarea>
                        @error('contenu') {{ $message }} @enderror
                    </div>
                    <div>
                        <input type="reset" value="Annuler" class="shadow appearance-none  border-none rounded py-2 px-3 mr-6 text-gray-700  focus:outline-none focus:shadow-outline bg-gray-400">
                        <input type="submit" value="Modifier" class="shadow appearance-none  border-none rounded  py-2 px-3 mr-6 text-gray-700  focus:outline-none focus:shadow-outline bg-green-400">
                    </div>
                    </form>
                </div>

                

            </div>
        </div>
    </div>
</x-app-layout>