<x-app-layout>
    <div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                </div>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!-- Display specific fields based on user role -->
                    @if (Auth::user()->role === 'user')
                          @include('profile.partials.user-profile-fields')
                    @elseif (Auth::user()->role === 'company')
                          @include('profile.partials.company-profile-fields')
                    @elseif (Auth::user()->role === 'admin')
                           @include('profile.partials.admin-profile-fields')
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Update Profile') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>