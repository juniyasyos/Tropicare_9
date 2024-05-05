<x-guest-layout>
    <p class="text-[15px] text-white font-alata mt-5">ggroupstudio</p>
    <div class="w-[50px] h-[3px] bg-white mt-1 rounded-full mb-8"></div>
    <div class="min-h-screen justify-center">
        <div class="flex-col flex  self-center z-10">
            <div class="self-start hidden md:block flex-col  text-white">
                <h1 class="mb-3 font-bold text-5xl">Hello, Create your account for more experience</h1>
                <p class="pr-3">Lorem ipsum is placeholder text commonly used in the graphic, print,
                    and publishing industries for previewing layouts and visual mockups</p>
            </div>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mt-[40px]">
                <h2 class="text-[32px] font-bold text-white font-tienne">Register</h2>
                <p class="text-[15px] text-white font-inter mb-[50px]">Silahkan lengkapi data untuk membuat akun</p>
            </div>

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nama pengguna')" />
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                    autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="space-y-2 mt-8">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-8">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-8">
                <x-input-label for="password_confirmation" :value="__('Ulangi password')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-5">
                <button type="button" class="toggle-password text-white"
                    data-target="password,password_confirmation">Show Password</button>
            </div>

            <script src="{{ asset('storage/src/js/auth.js') }}"></script>

            <x-primary-button>
                {{ __('Daftar') }}
            </x-primary-button>

            <div class="text-center text-gray-100 text-xs md:text-sm lg:text-lg">
                <p class="my-8 text-[12px] font-inter md:text-lg lg:text-lg">Sudah memiliki akun? <span
                        class="text-gray-900 hover:text-white"><a href="{{ route('login') }}">Login Sekarang!</a></span></p>
                <p>
                    Copyright © 2024 Kel-F7
                    <a href="" rel="" class="text-green hover:text-white "><br>PPL AGRO D</a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
