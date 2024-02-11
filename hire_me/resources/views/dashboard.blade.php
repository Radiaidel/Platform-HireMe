<x-app-layout>
    <div class="max-w-4xl mx-auto p-8">

        <!-- Bouton d'ajout d'offre d'emploi -->
        <button onclick="showModal()" id="showModalButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-8 right-0">Ajouter une offre d'emploi</button>

        <!-- Liste des offres d'emploi -->
        <div class="space-y-4">
        @foreach($offers as $offer)
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="flex p-4">
            <img class="w-16 h-16 rounded-full mr-4" src="{{ $offer->company->logo }}" alt="Logo de l'entreprise">
            <div>
                <h3 class="font-semibold text-lg"><span>{{ $offer->title }}</span></h3>
                <p class="text-gray-600">par <span class="text-blue-500">{{ $offer->company->name }}</span></p>
            </div>
        </div>
        <div class="p-4">
            <div class="flex flex-wrap gap-2 mb-2">
                <span class="bg-blue-100 text-blue-500 px-2 py-1 rounded-full text-xs border border-blue-500">{{ $offer->location }}</span>
            </div>
        </div>
        <div class="bg-gray-100 p-4 flex justify-between items-center">
            <div class="mr-4">
                <p class="text-gray-600">{{ $offer->daysLeftToApply }} left to apply</p>
            </div>
            <div>
                <p class="text-gray-600">{{ $offer->salary }}</p>
            </div>
        </div>
    </div>
@endforeach

        </div>

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
                                                <option value="temps_plein">À temps plein</option>
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
    // Récupérer le bouton d'ajout d'offre d'emploi
    const showModalButton = document.getElementById('showModalButton');
    // Récupérer le modal
    const modal = document.getElementById('myModal');

    // Fonction pour afficher le modal
    function showModal() {
        modal.classList.remove('hidden');
    }

    // Fonction pour masquer le modal
    function hideModal() {
        modal.classList.add('hidden');
    }

    // Écouter l'événement de clic sur le bouton
    showModalButton.addEventListener('click', showModal);
</script>