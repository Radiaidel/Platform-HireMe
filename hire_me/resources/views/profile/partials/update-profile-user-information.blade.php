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
        <div class="mb-4">
            <x-input-label for="about" :value="__('À propos :')" />
            <textarea id="about" name="about" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus autocomplete="about">{{ old('about', optional($jobseeker)->about) }}</textarea>            <x-input-error class="mt-2" :messages="$errors->get('about')" />
        </div>


        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="mb-4">
            <x-input-label for="title" :value="__('Titre :')" />
            <x-text-input id="title" name="title" type="text" class="block w-full mt-1" :value="old('title', optional($jobseeker)->title)" required autofocus autocomplete="title" />
        </div>

        <!-- Poste actuel -->
        <div class="mb-4">
            <x-input-label for="current_position" :value="__('Poste actuel :')" />
            <x-text-input id="current_position" name="current_position" type="text" class="block w-full mt-1" :value="old('current_position', optional($jobseeker)->current_position)" required autofocus autocomplete="current_position" />
        </div>

        <div class="mb-4">
            <x-input-label for="industry" :value="__('Industrie :')" />
            <x-text-input id="industry" name="industry" type="text" class="block w-full mt-1" :value="old('industry', optional($jobseeker)->industry)" required autofocus autocomplete="industry" />
        </div>

        <div class="mb-4">
            <x-input-label for="address" :value="__('Adresse :')" />
            <x-text-input id="address" name="address" type="text" class="block w-full mt-1" :value="old('address', optional($jobseeker)->address)" required autofocus autocomplete="address" />
        </div>

        <div class="mb-4">
            <x-input-label for="contact_information" :value="__('Informations de contact :')" />
            <x-text-input id="contact_information" name="contact_information" type="text" class="block w-full mt-1" :value="old('contact_information', optional($jobseeker)->contact_information)" required autofocus autocomplete="contact_information" />
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