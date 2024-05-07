<div  class="p-10 text-gray-900 ">
                    <h5 class="text-xl">Creer un post</h5> <br>
                    <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <label for="name">Nom</label>
                        <input type="text" name="name" class="block mt-1 w-full sm:rounded-lg w-1/2">
                        @error('name') {{ $message }} @enderror
                    </div>
                    <div>
                        <label for="contenu">Contenu</label>
                        <textarea name="contenu" id="" cols="8" rows="3"class="block mt-1 w-full sm:rounded-lg w-1/2  mb-4"></textarea>
                        @error('contenu') {{ $message }} @enderror
                    </div>
                    <div>
                        <input type="reset" value="Annuler" class="shadow appearance-none  border-none rounded py-2 px-3 mr-6 text-gray-700  focus:outline-none focus:shadow-outline bg-gray-400">
                        <input type="submit" value="Publier" class="shadow appearance-none  border-none rounded  py-2 px-3 mr-6 text-gray-700  focus:outline-none focus:shadow-outline bg-green-400">
                    </div>
                    </form>
                </div>  