{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@1,600&display=swap');

        p {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body>
    <div class="w-[60vw] mx-auto mt-10">
        <div class="flex justify-center">
            <img src="{{ asset('storage/' . $setting->logo_image) }}" class="max-w-[300px] items-center" alt="">
        </div>
        <div class="mb-3">

            <p class="text-yellow-400">
                Forgot your password? No problem. Just let us know your email address and we will email you a password
                reset
                link that will allow you to choose a new one.
            </p>
            @if (session('status'))
                <p class="text-green-500">
                    {{ session('status') }}
                </p>
            @endif
        </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white  ">Your
                Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path
                            d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                        <path
                            d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                    </svg>
                </div>
                <input type="text" id="email-address-icon" name="email" value="{{ old('email') }}"
                    class="bg-gray-50 border focus:border-orange-500 @error('email') border-red-500
                        @enderror  text-gray-900 text-sm rounded-lg    block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white "
                    placeholder="youremail@gmail.com">

            </div>
            @error('email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <div class="flex justify-end mt-4">
                <button class="rounded-full bg-orange-500 px-5 py-2 hover:bg-blue-500">Email Password Reset
                    Link</button>
            </div>
        </form>
    </div>
</body>

</html>
