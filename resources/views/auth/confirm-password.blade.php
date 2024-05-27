<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <!-- Judul dan Ikon -->
        <div class="text-center mb-6">
            <svg class="mx-auto w-16 h-16 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.24V11a2.5 2.5 0 00-2-2.45V8a4 4 0 10-8 0v.55A2.5 2.5 0 006 11v3.24c0 .304-.083.603-.235.855L4.5 17h5m-6 0h.01">
                </path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-800 mt-2">Konfirmasi Kata Sandi</h2>
        </div>

        <!-- Deskripsi -->
        <div class="mb-4 text-center text-gray-600">
            {{ __('Ini adalah area aman aplikasi. Harap konfirmasi kata sandi Anda sebelum melanjutkan.') }}
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Kata Sandi')" class="block mb-2 text-sm font-medium text-gray-700" />

                <x-text-input id="password"
                    class="block mt-1 w-full border border-gray-300 rounded-lg p-2 focus:ring-indigo-500 focus:border-indigo-500"
                    type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Tombol Konfirmasi -->
            <div class="flex justify-end mt-6">
                <x-primary-button
                    class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-blue-500 text-white rounded-lg hover:from-indigo-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                    {{ __('Konfirmasi') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
