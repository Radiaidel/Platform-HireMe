<x-app-layout>

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Liste des entreprises</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($companies as $company)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $company->logo) }}" class="w-full h-32 object-cover" alt="Logo de l'entreprise">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $company->name }}</h2>
                        <p class="text-gray-700">{{ $company->description }}</p>
<a href="{{ route('company.offers', $company->id) }}" class=" mt-4 text-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Voir les offres de cette entreprise</a>                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
