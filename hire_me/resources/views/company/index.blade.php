<x-app-layout>

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Liste des entreprises</h1>

        @if ($message)
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4" role="alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Champ de recherche -->
        <form action="{{ route('company.search') }}" method="GET" class="mb-4">
            <div class="flex">
                <input type="text" name="search" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="Rechercher une entreprise par nom ou slogan">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded ml-2">Rechercher</button>
            </div>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($companies as $company)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $company->logo) }}" class="w-full h-32 object-cover" alt="Logo de l'entreprise">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $company->name }}</h2>
                        <p class="text-gray-700">{{ $company->description }}</p>
                        <a href="{{ route('company.offers', $company->id) }}" class="mt-4 text-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Voir les offres de cette entreprise</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
