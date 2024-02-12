<!-- resources/views/offers/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $offer->title }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <p>{{ $offer->description }}</p>
                <p>Location: {{ $offer->location }}</p>
                <p>Contract Type: {{ $offer->contract_type }}</p>
                <p>Deadline: {{ $offer->deadline ? $offer->deadline->format('d/m/Y') : 'Pas de date limite' }}</p>
                <!-- Add more details here -->
            </div>
        </div>
    </div>
</x-app-layout>
