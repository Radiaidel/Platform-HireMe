<div class="max-w-xl p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <div class="flex flex-col items-center justify-end">
        <div class="mb-4">
        <img src="{{ asset('storage/' . auth()->user()->image_url) }}" alt="Photo de profil" class="w-32 h-32 rounded-full">
        </div>

        <h3 class="text-xl font-medium mb-2 text-center">{{ auth()->user()->name }}</h3>

        <a href="{{ route('cv.form') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Remplir le curriculum vitae</a>
    </div>
</div>
