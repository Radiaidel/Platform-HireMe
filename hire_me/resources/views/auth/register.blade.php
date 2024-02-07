<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Profile Image -->
        <div>
            <x-input-label for="profile_image" :value="__('Profile Image')" />
            <x-text-input id="profile_image" class="block mt-1 w-full text-xs" type="file" name="profile_image" required />
            <x-input-error :messages="$errors->get('profile_image')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full text-xs" type="text" name="name" :value="old('name')" required autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full text-xs" type="email" name="email" :value="old('email')" required autocomplete="new-email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full text-xs" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full text-xs" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />

            <div class="grid grid-cols-2 gap-4">
                <!-- User Card -->
                <div id="userCard" class="  p-4 border border-indigo-400 rounded-md cursor-pointer hover:border-indigo-800" onclick="selectRole('user')">
                    <div class="flex items-center justify-center mb-2">
                        <svg width="40px" height="40px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#000000">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #04009a;
                                        }

                                        .cls-2 {
                                            fill: #77acf1;
                                        }
                                    </style>
                                </defs>
                                <g data-name="35. Find" id="_35._Find">
                                    <path class="cls-1" d="M13,26a12.994,12.994,0,1,1,12.588-9.748,1,1,0,0,1-1.936-.5A10.894,10.894,0,0,0,24,13,11,11,0,1,0,13,24a10.869,10.869,0,0,0,6.275-1.969,10.652,10.652,0,0,0,2.749-2.747,1,1,0,0,1,1.651,1.131,12.681,12.681,0,0,1-3.256,3.257A12.861,12.861,0,0,1,13,26Z" />
                                    <path class="cls-1" d="M28.879,32a3.142,3.142,0,0,1-2.207-.914l-7.529-7.529a1,1,0,0,1,1.414-1.414l7.529,7.529a1.121,1.121,0,0,0,1.586-1.586l-7.529-7.529a1,1,0,0,1,1.414-1.414l7.529,7.529A3.121,3.121,0,0,1,28.879,32Z" />
                                    <path class="cls-2" d="M19,15H7a2,2,0,0,1-2-2V10A1,1,0,0,1,6,9H20a1,1,0,0,1,1,1v3A2,2,0,0,1,19,15ZM7,11v2H19V11Z" />
                                    <path class="cls-2" d="M17,21H9a3,3,0,0,1-3-3V14a1,1,0,0,1,1-1H19a1,1,0,0,1,1,1v4A3,3,0,0,1,17,21ZM8,15v3a1,1,0,0,0,1,1h8a1,1,0,0,0,1-1V15Z" />
                                    <path class="cls-2" d="M17,11H9a1,1,0,0,1-1-1V8a3,3,0,0,1,3-3h4a3,3,0,0,1,3,3v2A1,1,0,0,1,17,11ZM10,9h6V8a1,1,0,0,0-1-1H11a1,1,0,0,0-1,1Z" />
                                </g>
                            </g>

                        </svg>
                    </div>
                    <p class="text-gray-500 text-xs">Select this card if you are an individual user.</p>
                </div>

                <!-- Enterprise Card -->
                <div id="enterpriseCard" class="  p-4 border  border-indigo-400 rounded-md cursor-pointer hover:border-indigo-800" onclick="selectRole('company')">
                    <div class="flex items-center justify-center mb-2">
                        <svg fill="#4848ff" width="40px" height="40px" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#4848ff">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">

                                <path d="M8 2L8 6L4 6L4 48L46 48L46 14L30 14L30 6L26 6L26 2 Z M 10 4L24 4L24 8L28 8L28 46L19 46L19 39L15 39L15 46L6 46L6 8L10 8 Z M 10 10L10 12L12 12L12 10 Z M 14 10L14 12L16 12L16 10 Z M 18 10L18 12L20 12L20 10 Z M 22 10L22 12L24 12L24 10 Z M 10 15L10 19L12 19L12 15 Z M 14 15L14 19L16 19L16 15 Z M 18 15L18 19L20 19L20 15 Z M 22 15L22 19L24 19L24 15 Z M 30 16L44 16L44 46L30 46 Z M 32 18L32 20L34 20L34 18 Z M 36 18L36 20L38 20L38 18 Z M 40 18L40 20L42 20L42 18 Z M 10 21L10 25L12 25L12 21 Z M 14 21L14 25L16 25L16 21 Z M 18 21L18 25L20 25L20 21 Z M 22 21L22 25L24 25L24 21 Z M 32 22L32 24L34 24L34 22 Z M 36 22L36 24L38 24L38 22 Z M 40 22L40 24L42 24L42 22 Z M 32 26L32 28L34 28L34 26 Z M 36 26L36 28L38 28L38 26 Z M 40 26L40 28L42 28L42 26 Z M 10 27L10 31L12 31L12 27 Z M 14 27L14 31L16 31L16 27 Z M 18 27L18 31L20 31L20 27 Z M 22 27L22 31L24 31L24 27 Z M 32 30L32 32L34 32L34 30 Z M 36 30L36 32L38 32L38 30 Z M 40 30L40 32L42 32L42 30 Z M 10 33L10 37L12 37L12 33 Z M 14 33L14 37L16 37L16 33 Z M 18 33L18 37L20 37L20 33 Z M 22 33L22 37L24 37L24 33 Z M 32 34L32 36L34 36L34 34 Z M 36 34L36 36L38 36L38 34 Z M 40 34L40 36L42 36L42 34 Z M 32 38L32 40L34 40L34 38 Z M 36 38L36 40L38 40L38 38 Z M 40 38L40 40L42 40L42 38 Z M 10 39L10 44L12 44L12 39 Z M 22 39L22 44L24 44L24 39 Z M 32 42L32 44L34 44L34 42 Z M 36 42L36 44L38 44L38 42 Z M 40 42L40 44L42 44L42 42Z" />

                            </g>

                        </svg>
                    </div>
                    <p class="text-gray-500 text-xs">Select this card if you are a business or enterprise.</p>
                </div>
            </div>

            <input type="hidden" name="role" id="selectedRole">
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-xs text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function selectRole(role) {
            document.getElementById('selectedRole').value = role;

            const userCard = document.getElementById('userCard');
            const enterpriseCard = document.getElementById('enterpriseCard');
            console.log(role);
            if (role === 'user') {
                userCard.classList.add('border-indigo-900', 'border-2');
                userCard.classList.remove('border-indigo-400');
                enterpriseCard.classList.remove('border-indigo-900', 'border-2');
                enterpriseCard.classList.add('border-indigo-400');
            } else if (role === 'company') {
                enterpriseCard.classList.add('border-indigo-900', 'border-2');
                enterpriseCard.classList.remove('border-indigo-400');
                userCard.classList.remove('border-indigo-900', 'border-2');
                userCard.classList.add('border-indigo-400');
            }
        }
    </script>
</x-guest-layout>