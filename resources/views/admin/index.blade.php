<x-admin-layout>
    <div class="py-6 w-full">
        <div class="w-full ml-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 w-full">
                    <div class="flex items-center w-full h-18 p-2 border-b border-gray-200">
                            <!-- Photo de profil -->
                            <div class="flex-shrink-0 h-18 w-18 mr-4">
                                Img
                            </div>
                            <div class="flex-grow" style="width: 40%;">
                                <div class="text-sm font-medium text-gray-900">Infos</div>
                            </div>
                            <div class="flex-grow" style="width: 20%;">
                                <div class="text-sm text-gray-500"> Statut</div>
                            </div>
                            <div class="flex-grow" style="width: 40%;">
                                Role(s)
                            </div>
                            <!-- Option Modifier -->
                            <div class="flex-shrink-0">
                                Action
                            </div>
                        </div>
                    @foreach ($users as $user)
                        <div class="flex items-center w-full h-18 p-2 border-b border-gray-200">
                            <!-- Photo de profil -->
                            <div class="flex-shrink-0 h-18 w-18 mr-4">
                                <img class="h-18 w-18 rounded-full" src="{{ asset('images/2.png') }}" alt="Photo de profil">
                            </div>
                            <!-- Nom, Email, Statut et Rôle -->
                            <div class="flex-grow" style="width: 40%;">
                                <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $user->email }}</div>
                            </div>
                            <div class="flex-grow" style="width: 20%;">
                                <div class="text-sm text-gray-500"> Actif</div>
                                <div class="text-sm text-gray-500">
                                    @if ($user->lastLogins->isNotEmpty())
                                        @php
                                            $lastLogin = new DateTime($user->lastLogins->first()->last_login_at);
                                            $difference = now()->diffInMinutes($lastLogin);
                                        @endphp

                                        @if ($difference < 24 * 60) <!-- 24 heures en minutes -->
                                             il y a {{ $difference }} minutes <!-- Afficher la différence en minutes -->
                                        @else
                                            {{ $lastLogin->format('Y-m-d H:i:s') }} <!-- Afficher la date complète -->
                                        @endif
                                    @endif



                                </div>
                            </div>
                            <div class="flex-grow" style="width: 40%;">
                                <div class="text-sm text-gray-500">
                                    @foreach ($user->roles as $role) 
                                        <span class="bg-green-600 px-2 py-1 text-white rounded-md">{{  $role->name }}</span>                               
                                        
                                    @endforeach
                                </div>
                            </div>

                            <div class="justify-end flex space-x-2 items-center">
                                <div class="text-sm text-gray-500  ">
                                  <a href="{{ route('admin.userInfos.edit',$user->id ) }}" class="text-sm text-blue-800 font-bold text-x1 ">+</a>

                                </div>
                                <div class="text-sm text-gray-500  ">
                                    <a href="{{ route('admin.edit2',$user->id ) }}" class="text-sm text-red-800 font-bold text-x1 ">-</a>
                                 </div>
                                
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>







        <!-- Bouton pour ouvrir le modal -->
<button id="openModalButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
    +
</button>

<!-- Modal -->
<div id="myModal" class="modal hidden fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-96 mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <!-- Contenu du modal -->
            <div class="modal-content py-4 text-left px-6">
                <!-- Titre du modal -->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Effectuer une modification ?</p>
                    <button id="closeModalButton" class="text-gray-500 hover:text-gray-400 focus:outline-none">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M6.293 7.707a1 1 0 011.414 0L12 11.586l4.293-4.293a1 1 0 111.414 1.414L13.414 13l4.293 4.293a1 1 0 01-1.414 1.414L12 14.414l-4.293 4.293a1 1 0 01-1.414-1.414L10.586 13 6.293 8.707a1 1 0 010-1.414z">
                            </path>
                        </svg>
                    </button>
                </div>
                <!-- Contenu du modal -->
                <p>

                </p>
            </div>
        </div>
    </div>
</div>
    </div> 
    
 <script src="{{ asset('js/script.js') }}"></script>
</x-admin-layout>

