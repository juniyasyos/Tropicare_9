<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <!-- Judul dan Ikon -->
        <div class="text-center mb-6">
            <svg class="mx-auto w-16 h-16 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7V4a4 4 0 10-8 0v3M5 20h14a2 2 0 002-2v-5a2 2 0 00-2-2H5a2 2 0 00-2 2v5a2 2 0 002 2z"></path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-800 mt-2">Lupa Kata Sandi?</h2>
        </div>

        <!-- Deskripsi -->
        <div class="mb-4 text-center text-gray-600">
            {{ __('Lupa kata sandi Anda? Tidak masalah. Cukup beritahu kami alamat email Anda dan kami akan mengirimkan link reset kata sandi untuk memungkinkan Anda memilih yang baru.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Form -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Alamat Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="block mb-2 text-sm font-medium text-gray-700" />
                <x-text-input id="email"
                    class="block mt-1 w-full border border-gray-300 rounded-lg p-2 focus:ring-indigo-500 focus:border-indigo-500"
                    type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Tombol Kirim Link Reset Kata Sandi -->
            <div class="flex items-center justify-end mt-6">
                <x-primary-button
                    class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-blue-500 text-white rounded-lg hover:from-indigo-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                    {{ __('Kirim Link Reset Kata Sandi') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
