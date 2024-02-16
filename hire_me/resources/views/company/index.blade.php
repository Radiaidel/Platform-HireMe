



<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4 text-center">Liste des entreprises</h1>
        @isset ($message)
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4" role="alert">
                <p>{{ $message }}</p>
            </div>
        @endisset

        <!-- Champ de recherche -->
        <form action="{{ route('company.search') }}" method="GET" class="mb-4">
            <div class="flex">
                <input type="text" name="search" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="Rechercher une entreprise par nom ou slogan">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded ml-2">Rechercher</button>
            </div>
        </form>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($users as $user)
                @if($user->company) <!-- Vérifiez si l'utilisateur a une entrée dans la table companies -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6">
                        <img src="{{ asset('storage/' . $user->image_url) }}" alt="Avatar de {{ $user->name }}" class="w-32 rounded-full h-32 mx-auto">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $user->name }}</h2>
                            <p class="text-gray-600 mb-2">{{ $user->role }}</p>

                                <a href="{{ route('company.offers', $user->company->id) }}" class="mt-4 text-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Voir les offres de cette entreprise</a>
    
                                @if (auth()->user()->role === 'admin')
                                    <form action="{{ route('company.softDelete', $user->company->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 mt-4">Supprimer</button>
                                    </form>
                                @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>