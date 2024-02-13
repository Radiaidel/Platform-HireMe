<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <section class="flex flex-col justify-center lg:flex-row gap-2 mx-auto">

        <div class="py-12 lg:w-1/3">
            @if(auth()->user()->role === 'company')
            @include('profile.partials.leftside-profile')
            @elseif(auth()->user()->role === 'user')
            @include('profile.partials.user-leftside-profile')
            @endif




        </div>

        <!-- Partie droite avec les formulaires de mise à jour du profil -->
        <div class="py-12 lg:w-2/3">
            <div class="max-w-3xl  sm:px-6 lg:px-8 space-y-6">
                <!-- Formulaire de mise à jour des informations de profil -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Mise à jour des informations de profil</h2>
                        @if(auth()->user()->role === 'company')
                        @include('profile.partials.update-profile-information-form')
                        @elseif(auth()->user()->role === 'user')
                        @include('profile.partials.update-profile-user-information')
                        @endif
                    </div>
                </div>

                <!-- Formulaire de mise à jour du mot de passe -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Mise à jour du mot de passe</h2>
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Formulaire de suppression de compte -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Suppression de compte</h2>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>