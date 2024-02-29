<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 space-y-2 w-full text-xs">
            <x-input-label id="picture" :value="__('Profile Image')" />
            <div class="flex items-center justify-center">
                <label for="profile_image" class="w-20 h-20 rounded-full cursor-pointer flex items-center justify-center border border-dashed border-gray-500" id="profilePictureLabel">
                    <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" id="plusIcon" xmlns="http://www.w3.org/2000/svg" stroke="#e9e9e9">
                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                        <g id="SVGRepo_iconCarrier">
                            <path d="M6 12H18M12 6V18" stroke="#e9e9e9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                    </svg>
                </label>
                <input id="profile_image" class="hidden" type="file" name="profile_image" accept="image/*" onchange="displayImage('profilePictureLabel', 'profile_image')">
                <x-input-error :messages="$errors->get('profile_image')" class="mt-2" />
            </div>
        </div>


        <div class="mt-4">
            <x-input-label id="name_label" for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full text-xs" type="text" name="name" :value="old('name')" required autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full text-xs" type="email" name="email" :value="old('email')" required autocomplete="new-email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full text-xs" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full text-xs" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />

            <div class="grid grid-cols-2 gap-4">
                <div id="userCard" class="p-4 border border-indigo-400 rounded-md cursor-pointer hover:border-indigo-800" onclick="selectRole('user')">
                    <div class="flex items-center justify-center mb-2">
                        <svg height="50px" width="50px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 392.598 392.598" xml:space="preserve" fill="#000000">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">
                                <path style="fill:#FFFFFF;" d="M150.073,238.158c0-51.459,41.891-93.285,93.285-93.285c13.964,0,27.216,3.168,39.111,8.727v-49.455 h-71.305c-2.844,0-5.624-1.164-7.758-3.168c-2.004-2.004-3.168-4.784-3.168-7.758V21.786H32.739 c-6.012,0-10.925,4.848-10.925,10.925v327.111c0,6.012,4.848,10.925,10.925,10.925h238.933c6.012,0,10.925-4.848,10.925-10.925 v-37.107c-11.895,5.56-25.083,8.727-39.111,8.727C191.964,331.442,150.073,289.552,150.073,238.158z" />
                                <polygon style="fill:#FFC10D;" points="222.089,37.236 222.089,82.295 267.147,82.295 " />
                                <path style="fill:#FFFFFF;" d="M243.422,166.594c-39.434,0-71.499,32.065-71.499,71.499s32.129,71.434,71.499,71.434 s71.499-32.065,71.499-71.499S282.857,166.594,243.422,166.594z" />
                                <path style="fill:#ff8000;" d="M243.422,287.806c-27.41,0-49.713-22.238-49.713-49.713s22.238-49.713,49.713-49.713 s49.713,22.238,49.713,49.713C293.135,265.503,270.768,287.806,243.422,287.806z" />
                                <g>
                                    <path style="fill:#400080;" d="M57.822,166.723h90.505c6.012,0,10.925-4.848,10.925-10.925c0-6.012-4.848-10.925-10.925-10.925 H57.822c-6.012,0-10.925,4.848-10.925,10.925C46.897,161.81,51.81,166.723,57.822,166.723z" />
                                    <path style="fill:#400080;" d="M57.822,222.836h66.715c6.012,0,10.925-4.848,10.925-10.925c0-6.012-4.848-10.925-10.925-10.925 H57.822c-6.012,0-10.925,4.848-10.925,10.925S51.81,222.836,57.822,222.836z" />
                                    <path style="fill:#400080;" d="M57.822,278.95h66.715c6.012,0,10.925-4.849,10.925-10.925s-4.848-10.925-10.925-10.925H57.822 c-6.012,0-10.925,4.849-10.925,10.925S51.81,278.95,57.822,278.95z" />
                                    <path style="fill:#400080;" d="M148.327,313.277H57.822c-6.012,0-10.925,4.848-10.925,10.925c0,6.012,4.848,10.925,10.925,10.925 h90.505c6.012,0,10.925-4.848,10.925-10.925C159.188,318.125,154.339,313.277,148.327,313.277z" />
                                </g>
                                <g>
                                    <path style="fill:#FFC10D;" d="M46.444,53.333h14.675v26.505c0,7.434-4.073,8.275-5.624,8.275c-3.232,0-6.335-1.875-9.374-5.495 l-5.689,9.051c4.396,5.236,9.632,7.887,15.515,7.887c4.784,0,16.291-1.939,16.291-20.17V42.537H46.444V53.333z" />
                                    <path style="fill:#FFC10D;" d="M171.859,69.624c0.84-0.453,7.24-2.78,7.24-12.218c0-14.998-14.158-14.998-17.455-14.998H142.38 v56.501h21.657c6.788,0,17.39-1.939,17.842-15.709C182.202,73.568,174.962,70.4,171.859,69.624z M153.499,53.139h5.301 c3.232,0,5.56,0.388,6.982,1.228c1.422,0.776,2.069,2.457,2.069,4.913c0,2.457-0.776,4.202-2.263,4.848 c-1.487,0.776-3.814,1.164-6.788,1.164h-5.236V53.075h-0.065V53.139z M168.174,87.014c-1.552,0.905-3.943,1.293-7.111,1.293h-7.564 V75.313h6.465c3.685,0,6.335,0.388,8.016,1.228c1.681,0.84,2.457,2.521,2.457,5.172C170.566,84.364,169.725,86.044,168.174,87.014z " />
                                    <path style="fill:#FFC10D;" d="M107.147,41.18c-17.261,0-25.988,15.709-25.988,29.22c0,11.055,6.853,29.22,25.988,29.22 c17.261,0,25.988-15.709,25.988-29.22C133.071,59.345,126.218,41.18,107.147,41.18z M121.822,70.4 c0,8.727-5.624,18.166-14.675,18.166c-7.564,0-14.675-7.564-14.675-18.166h0.065c0-8.727,5.624-18.166,14.675-18.166 C114.776,52.17,121.822,59.733,121.822,70.4L121.822,70.4z" />
                                    <path style="fill:#FFC10D;" d="M312.659,300.671c-0.065,0-0.129,0-0.259,0c-2.521,2.78-5.172,5.495-8.145,7.952v7.758 l51.911,51.911c3.168,3.168,8.792,3.168,11.96,0c3.297-3.297,3.297-8.663,0-11.96L312.659,300.671z" />
                                </g>
                                <path style="fill:#400080;" d="M383.705,340.816l-58.311-58.44c7.176-13.188,11.442-28.186,11.442-44.283 c0-28.121-12.606-53.398-32.388-70.465V93.156c0-2.844-1.164-5.624-3.168-7.758l-82.36-82.23C216.917,1.164,214.137,0,211.164,0 H32.739C14.703,0,0.028,14.675,0.028,32.711v327.111c0,18.101,14.675,32.776,32.711,32.776h238.933 c18.036,0,32.711-14.675,32.711-32.711v-12.671l36.461,36.461c12.283,12.671,32.517,10.99,42.796,0 C395.535,371.846,395.535,352.646,383.705,340.816z M368.319,368.291c-3.232,3.168-8.792,3.168-11.96,0l-51.911-51.911v-7.758 c2.844-2.457,5.56-5.172,8.145-7.952c0.065,0,0.129,0,0.259,0l55.661,55.661C371.551,359.564,371.551,364.929,368.319,368.291z M314.921,238.158c0,39.434-32.065,71.499-71.499,71.499s-71.499-32.065-71.499-71.499s32.129-71.499,71.499-71.499 C282.857,166.594,314.921,198.659,314.921,238.158z M222.089,37.236l45.059,45.059h-45.059L222.089,37.236L222.089,37.236z M282.533,359.822c0,6.012-4.848,10.925-10.925,10.925H32.739c-6.012,0-10.925-4.848-10.925-10.925V32.711 c0-6.012,4.848-10.925,10.925-10.925h167.499v71.305c0,2.844,1.164,5.624,3.168,7.758c2.004,2.004,4.784,3.168,7.758,3.168h71.305 v49.455c-11.895-5.56-25.083-8.727-39.111-8.727c-51.459,0-93.285,41.891-93.285,93.285c0,51.459,41.891,93.285,93.285,93.285 c13.964,0,27.216-3.168,39.111-8.727v37.236H282.533z" />
                            </g>

                        </svg>
                    </div>
                    <p class="text-gray-500 text-xs">Select this card if you are an individual user.</p>
                </div>

                <div id="enterpriseCard" class="p-4 border border-indigo-400 rounded-md cursor-pointer hover:border-indigo-800" onclick="selectRole('company')">
                    <div class="flex items-center justify-center mb-2">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 392.727 392.727" xml:space="preserve" width="50px" height="50px" fill="#000000">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">
                                <path style="fill:#FFFFFF;" d="M359.822,21.947H32.711c-6.012,0-10.925,4.848-10.925,10.925v258.909 c0,6.012,4.848,10.925,10.925,10.925h327.111c6.012,0,10.925-4.848,10.925-10.925V32.873 C370.747,26.861,365.834,21.947,359.822,21.947z" />
                                <g>
                                    <polygon style="fill:#ffc10d;" points="129.552,324.558 95.483,370.909 297.051,370.909 262.982,324.558 " />
                                    <rect x="65.422" y="65.584" style="fill:#ffc10d;" width="261.754" height="39.564" />
                                </g>
                                <rect x="65.422" y="126.933" style="fill:#ff7e40;" width="261.754" height="132.137" />
                                <g>
                                    <path style="fill:#400080;" d="M359.822,0.162H32.711C14.675,0.162,0,14.836,0,32.873v258.909 c0,18.036,14.675,32.711,32.711,32.711h69.818L65.228,375.24c-2.457,3.297-2.78,7.758-0.905,11.378 c1.875,3.62,5.624,5.947,9.762,5.947h244.622h0.065c6.012,0,10.925-4.849,10.925-10.925c0-2.909-1.164-5.56-3.038-7.499 l-36.525-49.778h69.883c18.036,0,32.711-14.675,32.711-32.711V32.873C392.533,14.836,377.859,0.162,359.822,0.162z M297.051,370.909H95.483l34.069-46.352h133.366L297.051,370.909z M359.822,302.707H32.711c-6.012,0-10.925-4.848-10.925-10.925 V32.873c0-6.012,4.848-10.925,10.925-10.925h327.111c6.012,0,10.925,4.848,10.925,10.925v258.909h0.065 C370.747,297.794,365.899,302.707,359.822,302.707z" />
                                    <path style="fill:#400080;" d="M337.972,43.733H54.562c-6.012,0-10.925,4.848-10.925,10.925v215.337 c0,6.012,4.848,10.925,10.925,10.925h283.539c6.012,0,10.925-4.848,10.925-10.925V54.723 C348.962,48.711,343.984,43.733,337.972,43.733z M327.176,259.071h-0.065H65.422V126.933h261.754V259.071z M327.176,105.147h-0.065 H65.422V65.584h261.754V105.147z" />
                                    <path style="fill:#400080;" d="M138.537,188.154c11.313,0,16.356-10.279,16.356-18.101c0-7.822-5.107-18.101-16.356-18.101 c-11.766,0-16.743,10.99-16.356,18.101C121.794,177.164,126.772,188.154,138.537,188.154z M138.537,160.356 c6.4,0,7.758,6.853,7.758,9.762c0,2.909-1.228,9.762-7.758,9.762c-6.206,0-7.758-6.853-7.758-9.762 C130.78,167.208,132.267,160.356,138.537,160.356z" />
                                    <path style="fill:#400080;" d="M102.465,188.154c3.879,0,7.046-1.422,9.503-4.073c2.457-2.715,3.685-6.788,3.685-12.218v-29.802 h-21.01v8.727h11.96v21.463c0,2.263-0.453,3.879-1.422,5.042c-0.905,1.099-2.004,1.681-3.232,1.681 c-2.651,0-5.172-1.487-7.564-4.461l-4.655,7.37C93.414,186.085,97.616,188.154,102.465,188.154z" />
                                    <path style="fill:#400080;" d="M246.238,95.838h5.43c6.012,0,10.925-4.848,10.925-10.925c0-6.077-4.849-10.925-10.925-10.925h-5.43 c-6.012,0-10.925,4.848-10.925,10.925C235.313,90.99,240.226,95.838,246.238,95.838z" />
                                    <path style="fill:#400080;" d="M94.966,95.838h103.564c6.012,0,10.925-4.848,10.925-10.925c0-6.077-4.848-10.925-10.925-10.925 H94.966c-6.012,0-10.925,4.848-10.925,10.925C84.04,90.99,88.954,95.838,94.966,95.838z" />
                                    <path style="fill:#400080;" d="M288.776,95.838h5.43c6.012,0,10.925-4.848,10.925-10.925c0-6.077-4.848-10.925-10.925-10.925h-5.43 c-6.012,0-10.925,4.848-10.925,10.925C277.851,90.99,282.764,95.838,288.776,95.838z" />
                                    <path style="fill:#400080;" d="M89.794,244.848h85.204c6.012,0,10.925-4.848,10.925-10.925s-4.848-10.925-10.925-10.925H89.794 c-6.012,0-10.925,4.848-10.925,10.925C78.869,239.935,83.782,244.848,89.794,244.848z" />
                                    <path style="fill:#400080;" d="M219.927,244.848h85.333c6.012,0,10.925-4.848,10.925-10.925s-4.848-10.925-10.925-10.925h-85.333 c-6.012,0-10.925,4.848-10.925,10.925C209.002,239.935,213.98,244.848,219.927,244.848z" />
                                    <path style="fill:#400080;" d="M219.927,209.034h85.333c6.012,0,10.925-4.848,10.925-10.925c0-6.012-4.848-10.925-10.925-10.925 h-85.333c-6.012,0-10.925,4.848-10.925,10.925C209.002,204.186,213.98,209.034,219.927,209.034z" />
                                    <path style="fill:#400080;" d="M219.927,173.22h85.333c6.012,0,10.925-4.848,10.925-10.925c0-6.012-4.848-10.925-10.925-10.925 h-85.333c-6.012,0-10.925,4.848-10.925,10.925S213.98,173.22,219.927,173.22z" />
                                    <path style="fill:#400080;" d="M169.891,183.046c2.392,3.491,5.495,5.172,9.115,5.172c7.434,0,14.158-8.469,14.158-18.489 c0-7.24-3.943-17.842-14.093-17.842c-3.814,0-6.853,1.487-9.18,4.461v-17.325h-8.663v48.549h8.663V183.046z M177.196,160.291 c6.206,0,7.37,6.853,7.37,9.762s-1.228,9.762-7.37,9.762c-5.883,0-7.37-6.853-7.37-9.762 C169.826,167.208,171.313,160.291,177.196,160.291z" />
                                </g>
                            </g>

                        </svg>
                    </div>
                    <p class="text-gray-500 text-xs">Select this card if you are a business or enterprise.</p>
                </div>
            </div>

            <input type="hidden" name="role" id="selectedRole" value="user">
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
            const profileImageLabel = document.getElementById('picture');
            const nameLabel = document.getElementById('name_label');

            if (role === 'user') {
                userCard.classList.add('border-indigo-900', 'border-2');
                userCard.classList.remove('border-indigo-400');
                enterpriseCard.classList.remove('border-indigo-900', 'border-2');
                enterpriseCard.classList.add('border-indigo-400');
                profileImageLabel.textContent = 'Profile Image';
                nameLabel.textContent = 'User Name';
            } else if (role === 'company') {
                enterpriseCard.classList.add('border-indigo-900', 'border-2');
                enterpriseCard.classList.remove('border-indigo-400');
                userCard.classList.remove('border-indigo-900', 'border-2');
                userCard.classList.add('border-indigo-400');
                profileImageLabel.textContent = 'Company Logo';
                nameLabel.textContent = 'Company Name';
            }
        }

        selectRole("user");

        function displayImage(onlabel, inInput) {
            var input = document.getElementById(inInput);
            var label = document.getElementById(onlabel);

            var file = input.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    label.style.backgroundImage = 'url(' + e.target.result + ')';
                    label.style.backgroundSize = 'cover';
                    label.style.backgroundPosition = 'center';
                    label.style.border = 'none';
                    document.getElementById('plusIcon').style.display = 'none';
                };

                reader.readAsDataURL(file);
            }
        }
    </script>
</x-guest-layout>