<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <!-- Judul dan Ikon -->
        <div class="text-center mb-6">
            <svg class="mx-auto w-16 h-16 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-800 mt-2">Verifikasi Alamat Email</h2>
        </div>

        <!-- Pesan -->
        <div class="mb-4 text-center text-gray-600">
            {{ __('Terima kasih telah mendaftar! Sebelum memulai, bisa Anda verifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirim melalui email? Jika Anda tidak menerima email, kami dengan senang hati akan mengirimkan yang lain.') }}
        </div>

        <!-- Status Verifikasi -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat registrasi.') }}
            </div>
        @endif

        <!-- Tombol Resend dan Logout -->
        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-primary-button class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-blue-500 text-white rounded-lg hover:from-indigo-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                        {{ __('Kirim Ulang Email Verifikasi') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                    {{ __('Keluar') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
