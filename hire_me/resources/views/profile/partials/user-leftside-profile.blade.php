<div class="max-w-xl p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <div class="flex flex-col items-center justify-end">
        <div class="mb-4">
            <img src="{{ asset('storage/' . auth()->user()->image_url) }}" alt="Photo de profil" class="w-32 h-32 rounded-full">
        </div>
        <h3 class="text-xl font-medium mb-2 text-center">{{ auth()->user()->name }}</h3>
        @if(auth()->user()->jobseeker && auth()->user()->jobseeker->curriculumVitae)
        <div class="flex gap-6">

            <a href="{{ route('CV.Show') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Voir le curriculum vitae</a>
            <a href="{{ route('download-cv') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Télécharger CV</a>
        </div>
        @elseif(auth()->user()->jobseeker)
        <a href="{{ route('cv.form') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Remplir le curriculum vitae</a>
        @else
        <h3 class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Merci de remplir vos informations pour remplir le  CV</h3>

        @endif
    </div>
</div>