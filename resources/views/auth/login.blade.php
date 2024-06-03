<x-guest-layout>
    <p class="text-[15px] text-white font-alata mt-5">ggroupstudio</p>
    <div class="w-[50px] h-[3px] bg-white mt-1 rounded-full mb-8"></div>
    <div class="min-h-screen justify-center">
        <div class="flex-col flex  self-center z-10">
            <div class="self-start hidden md:block flex-col  text-white">
                <h1 class="mb-3 font-bold text-5xl">Hi? Selamat Datang di Tropicare</h1>
                <p class="pr-3">Aplikasi Tropicare adalah terobosan mutakhir untuk membantu para petani untuk mendeteksi penyakit pada tanaman mereka</p>
            </div>
        </div>
        <form method="POST" action="{{ route('login') }}"
            class="p-6 rounded-xl inset-0 bg-cover bg-no-repeat bg-fixed mt-24"
            style="background-image: url('src/image/blur.png');">
            @csrf

            <div class="mt-[-20px]">
                <h2 class="text-[32px] font-bold text-white font-tienne">Login</h2>
                <p class="text-[15px] text-white font-inter mb-[50px]">Silahkan masuk ke akun anda</p>
            </div>

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            {{-- Email Addres --}}
            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                    autocomplete="username" />
                <div id="emailValidationMessage" class="text-red-500 text-sm mt-1"></div>
            </div>

            {{-- Password --}}
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                <div id="passwordValidationMessage" class="text-red-500 text-sm mt-1"></div>
            </div>

            <div class="flex justify-end mt-5">
                <button type="button" class="toggle-password text-white"
                    data-target="password,password_confirmation">Show Password</button>
            </div>


            <!-- Remember Me -->
            <div class="flex justify-between">
                <div class="flex items-center justify-between mt-5">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="h-4 w-4 bg-transparent focus:ring-blue-400 border-gray-300 rounded" name="remember">
                        <span class="ml-2 block text-sm text-white">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="text-sm mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-gray-900 font-inter hover:text-white" href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif
                </div>
            </div>

            <x-primary-button>
                {{ __('Masuk') }}
            </x-primary-button>

            <div class="text-center text-gray-100 text-xs md:text-sm lg:text-lg">
                <p class="my-8 text-[12px] font-inter md:text-lg lg:text-lg">Belum memiliki akun? <span
                        class="text-gray-900 hover:text-white"><a href="{{ route('register') }}">Buat
                            Sekarang!</a></span></p>
                <p>
                    Copyright © 2024 Kel-F7
                    <a href="https://codepen.io/uidesignhub" rel="" target="_blank" title="Ajimon"
                        class="text-green hover:text-white "><br>PPL AGRO D</a>
                </p>
            </div>
        </form>
    </div>
    <script src="{{ asset('storage/src/js/auth.js') }}"></script>
</x-guest-layout>
