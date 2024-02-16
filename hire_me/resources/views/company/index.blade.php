<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4 text-center">Liste des entreprises</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($users as $user)
                @if($user->company) <!-- Vérifiez si l'utilisateur a une entrée dans la table companies -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6">
                        <img src="{{ asset('storage/' . $user->image_url) }}" alt="Avatar de {{ $user->name }}" class="w-32 rounded-full h-32 mx-auto">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $user->name }}</h2>
                            <p class="text-gray-600 mb-2">{{ $user->role }}</p>
                            @if (auth()->user()->role === 'admin')
                                <form action="{{ route('company.softDelete', $user->company->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
