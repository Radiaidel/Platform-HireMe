<x-app-layout>

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Offres de {{ $company->user->name }}</h1>
        @if(is_null($offers))
        <p>Aucune offre n'est disponible pour cette entreprise pour le moment.</p>
        @else
        @if($offers->isEmpty())
        <p>Aucune offre n'est disponible pour cette entreprise pour le moment.</p>
        @else
        @foreach($offers as $offer)
        <a href="{{ route('offers.show', $offer->id) }}" class="block mb-4">
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-4">
                <div class="flex items-center justify-between p-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full mr-4" src="{{ asset('storage/app/' . $offer->company->logo) }}" alt="Logo">
                        <div>
                            <h3 class="font-semibold text-lg">{{ $offer->title }}</h3>
                            <p class="text-gray-600">par <span class="text-blue-500">{{ auth()->user()->name }}</span></p>
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
            </div>
        </a>
        @endforeach
        @endif
        @endif
    </div>

</x-app-layout>