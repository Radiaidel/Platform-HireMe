<div class="max-w-xl p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <div class="flex flex-col items-center justify-end">
        <div class="mb-4">
        <img src="{{ asset('storage/' . auth()->user()->image_url) }}" alt="Photo de profil" class="w-32 h-32 rounded-full">
        </div>

        <h3 class="text-xl font-medium mb-2 text-center">{{ auth()->user()->name }}</h3>

        <div class="flex flex-col gap-4">
            <div class="flex items-center justify-between bg-gray-200 p-4 rounded-md text-center">
                <h4 class="text-lg font-medium mb-2">Nombre d'offres d'emploi</h4>
                <p class="text-gray-600">nombreOffres </p>
            </div>
            <div class="flex items-center justify-between bg-gray-200 p-4 rounded-md text-center">
                <h4 class="text-lg font-medium mb-2">Nombre d'abonnés à la newsletter</h4>
                <p class="text-gray-600"> nombreAbonnes </p>
            </div>
            <div class="flex items-center justify-between bg-gray-200 p-4 rounded-md text-center">
                <h4 class="text-lg font-medium mb-2">Nombre de candidatures</h4>
                <p class="text-gray-600"> nombreCandidatures </p>
            </div>
        </div>
    </div>
</div>
