<!-- admin/dashboard.blade.php -->

<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Tableau de bord administrateur</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
                <h2 class="text-xl font-bold mb-2">Nombre total d'utilisateurs</h2>
                <p class="text-4xl font-bold text-gray-800">{{ $totalUsers }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
                <h2 class="text-xl font-bold mb-2">Nombre total d'entreprises</h2>
                <p class="text-4xl font-bold text-gray-800">{{ $totalCompanies }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
                <h2 class="text-xl font-bold mb-2">Nombre total d'offres</h2>
                <p class="text-4xl font-bold text-gray-800">{{ $totalOffers }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
