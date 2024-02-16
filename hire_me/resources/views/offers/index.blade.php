<x-app-layout>
    <div class="max-w-4xl mx-auto p-8">

        <!-- <div class="mb-4">
            <input type="text" id="searchInput" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="Rechercher une offre">
        </div> -->
        @if($message)
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4" role="alert">
            <p>{{ $message }}</p>
        </div>
        @endif
        <form action="{{ route('search.offers') }}" method="POST" class="mb-4">
            @csrf
            <div class="flex">

                <input type="text" name="search" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="Rechercher une offre">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rechercher</button>
            </div>
        </form>

        <div id="searchResults" class="space-y-4">
            <!-- Les offres de recherche seront affichées ici -->
        </div>


        @if (auth()->user()->role === 'company' && auth()->user()->company !== null)
        <button onclick="showModal()" id="showModalButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-8">Ajouter une offre d'emploi</button>
        @endif

        @if ($offers->isEmpty())
        <div class="text-center text-gray-600 font-bold mb-8">
            {{$message}}
        </div>
        @else
        <div class="space-y-4">

            @foreach($offers as $offer)
            <a href="{{ route('offers.show', $offer->id) }}" class="block mb-4">
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-4">
                    <div class="flex items-center justify-between p-4 border-b border-gray-200">
                        <div class="flex items-center">
                            <img class="w-12 h-12 rounded-full mr-4" src="{{ asset('storage/app/' . $offer->company->logo) }}" alt="Logo">
                            <div>
                                <h3 class="font-semibold text-lg">{{ $offer->title }}</h3>
                                <p class="text-gray-600">par <span class="text-blue-500">{{ $offer->company->user->name }}</span></p>
                            </div>
                        </div>
                        <div>
                            <span class="text-gray-600 text-xs">{{ $offer->location }}</span>
                        </div>

                    </div>
                    <div class="p-4">
                        <p class="text-gray-700">{{ $offer->description }}</p>
                    </div>
                    <div class="p-4 flex items-center justify-between border-t border-gray-200">
                        <div>
                            <span class="bg-blue-100 text-blue-500 px-2 py-1 rounded-full  border border-blue-500">{{ $offer->contract_type }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">{{ $offer->deadline ? $offer->deadline->format('d/m/Y') : 'Pas de date limite' }}</span>
                        </div>
                    </div>
                    @if(auth()->user()->role === 'company')
                    <div class="p-4 flex items-center justify-between">
                        <form action="{{route('offer.destroy')}}" method="POST">
                            @csrf
                            <input type="hidden" name="offer_id" value="{{ $offer->id}}">
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </div>
                    @endif
                    @if (auth()->user()->role === 'admin')
                    <form action="{{ route('offers.softDelete', $offer->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                    </form>
                    @endif
                </div>
            </a>
            @endforeach


        </div>
        @endif
        <!-- Modal d'ajout d'offre d'emploi -->





        <div id="myModal" class="hidden fixed inset-0 overflow-y-auto" x-show="showModal" @click.away="showModal = false">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Overlay -->
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <!-- Contenu du modal -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <!-- Contenu du modal ici -->
                    <div class="flex justify-end px-4 py-2">
                        <button onclick="hideModal()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                <!-- Icône d'ajout -->
                                <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">Ajouter une nouvelle offre d'emploi</h3>
                                <div>
                                    <form action="/ajouter-offre" method="POST">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ auth()->user()->id }}">
                                        <div class="mb-4">
                                            <label for="title" class="block text-gray-700 font-bold mb-2">Titre de l'offre :</label>
                                            <input type="text" id="title" name="title" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="Titre de l'offre" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="description" class="block text-gray-700 font-bold mb-2">Description :</label>
                                            <textarea id="description" name="description" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="Description de l'offre" required></textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label for="skills_required" class="block text-gray-700 font-bold mb-2">Compétences requises :</label>
                                            <textarea type="text" id="skills_required" name="skills_required" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="Compétences requises" required></textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label for="contract_type" class="block text-gray-700 font-bold mb-2">Type de contrat :</label>
                                            <select id="contract_type" name="contract_type" class="border border-gray-300 rounded-md px-3 py-2 w-full" required>
                                                <option value="à distance">À distance</option>
                                                <option value="hybride">Hybride</option>
                                                <option value="à temps plein">À temps plein</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="location" class="block text-gray-700 font-bold mb-2">Emplacement :</label>
                                            <input type="text" id="location" name="location" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="Emplacement" required>
                                        </div>
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>

<script>
    const showModalButton = document.getElementById('showModalButton');
    const modal = document.getElementById('myModal');

    function showModal() {
        modal.classList.remove('hidden');
    }

    function hideModal() {
        modal.classList.add('hidden');
    }

    showModalButton.addEventListener('click', showModal);
</script>