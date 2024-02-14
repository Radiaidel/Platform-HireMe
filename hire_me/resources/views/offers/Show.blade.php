<x-app-layout>
    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Erreur!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Succès!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif
    <div class=" mx-auto p-8 flex justify-between">
        <div class="w-2/3 pr-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-8">
                    <h1 class="text-2xl font-bold mb-4">{{ $offer->title }}</h1>
                    <p class="text-gray-600 mb-4">Description : {{ $offer->description }}</p>
                    <p class="text-gray-600 mb-4">Compétences requises : {{ $offer->skills_required }}</p>
                    <p class="text-gray-600 mb-4">Type de contrat : {{ $offer->contract_type }}</p>
                    <p class="text-gray-600 mb-4">Emplacement : {{ $offer->location }}</p>
                    <p class="text-gray-600 mb-4">Date limite : {{ $offer->deadline ? $offer->deadline->format('d/m/Y') : 'Pas de date limite' }}</p>
                    @if(auth()->user()->role === 'user')
                    <a href="{{ route('apply', $offer->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Postuler</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="w-1/3">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-8">
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full mr-4" src="{{ asset('storage/app/' . $offer->company->logo) }}" alt="Logo">
                        <div>
                            <p class="text-gray-600">par <span class="text-blue-500">{{ auth()->user()->name }}</span></p>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold mb-4">{{ $offer->company->name }}</h2>
                    <p class="text-gray-600 mb-4">{{ $offer->company->slogan }}</p>
                    <p class="text-gray-600 mb-4">{{ $offer->company->industry }}</p>
                    <p class="text-gray-600 mb-4">{{ $offer->company->description }}</p>
                    @if(auth()->user()->role === 'company' && auth()->user()->company == $offer->company)
                    <button onclick="showCandidatesModal()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Voir les candidats</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour afficher les candidats -->
    <div id="candidatesModal" class="fixed inset-0 overflow-y-auto hidden z-50">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenu du modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <!-- Contenu du modal ici -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Icône -->
                            <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">Candidats</h3>

                            <p class="text-gray-700">Liste des candidats...</p>
                            <ul id="candidatesList" class="mt-2">

                            </ul>

                        </div>
                    </div>
                </div>

                <!-- Bouton pour fermer le modal -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button onclick="hideCandidatesModal()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">Fermer</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    const showCandidatesModal = () => {
        const identifier = "{{ $offer->id }}";
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `/get-candidates/${identifier}`, true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                const response = JSON.parse(xhr.responseText);
                const candidatesList = document.getElementById('candidatesList');
                candidatesList.innerHTML = ''; // Clear previous candidates

                response.forEach(application => {
                    const candidate = application.job_seeker.user;
                    const cvUrl = candidate.cv ? candidate.cv.download_url : ''; // URL to download CV

                    // Create list item for each candidate
                    const listItem = document.createElement('li');

                    // Create a div to hold candidate information
                    const candidateInfo = document.createElement('div');
                    candidateInfo.classList.add('candidate-info');

                    // Create an image element for candidate's image
                    const imageElement = document.createElement('img');
                    imageElement.src = candidate.image_url;
                    imageElement.alt = candidate.name + ' Image';

                    // Create a paragraph for candidate's name
                    const nameParagraph = document.createElement('p');
                    nameParagraph.textContent = candidate.name;

                    // Create a paragraph for candidate's email
                    const emailParagraph = document.createElement('p');
                    emailParagraph.textContent = candidate.email;

                    // Create a button to view candidate's CV
                    const cvButton = document.createElement('button');
                    cvButton.textContent = 'Voir le CV';
                    cvButton.addEventListener('click', () => {
                        window.open(cvUrl, '_blank');
                    });

                    // Append elements to candidate info div
                    candidateInfo.appendChild(imageElement);
                    candidateInfo.appendChild(nameParagraph);
                    candidateInfo.appendChild(emailParagraph);
                    candidateInfo.appendChild(cvButton);

                    // Append candidate info div to list item
                    listItem.appendChild(candidateInfo);

                    // Append list item to candidates list
                    candidatesList.appendChild(listItem);
                });

                const modal = document.getElementById('candidatesModal');
                modal.classList.remove('hidden');
            } else {
                console.error('La requête a échoué');
            }
        };



        xhr.onerror = function() {
            console.error('Une erreur s\'est produite lors de la connexion');
        };

        xhr.send();
    };

    const hideCandidatesModal = () => {
        const modal = document.getElementById('candidatesModal');
        modal.classList.add('hidden');
    };
</script>