<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Titre :</label>
                <input type="text" id="title" name="title" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="Titre" required>
            </div>

            <!-- Poste actuel -->
            <div class="mb-4">
                <label for="current_position" class="block text-gray-700 font-bold mb-2">Poste actuel :</label>
                <input type="text" id="current_position" name="current_position" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="Poste actuel" required>
            </div>

            <div class="mb-4">
                <label for="industry" class="block text-gray-700 font-bold mb-2">Industrie :</label>
                <input type="text" id="industry" name="industry" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="Industrie" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-bold mb-2">Adresse :</label>
                <input type="text" id="address" name="address" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="Adresse" required>
            </div>

            <div class="mb-4">
                <label for="contact_info" class="block text-gray-700 font-bold mb-2">Informations de contact :</label>
                <input type="text" id="contact_info" name="contact_info" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="Informations de contact" required>
            </div>

            <div class="mb-4">
                <label for="about" class="block text-gray-700 font-bold mb-2">À propos :</label>
                <textarea id="about" name="about" class="border border-gray-300 rounded-md px-3 py-2 w-full" placeholder="À propos" required></textarea>
            </div>


        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>