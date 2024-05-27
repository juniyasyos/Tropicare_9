<div class="h-full bg-white">
    <div class="fixed flex justify-end w-9/12 z-30 top-7 right-0">
        @if (session('error'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-500 transform" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full" role="alert"
                class="alert alert-error bg-red-500 text-white p-4 rounded-md shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if (session('data_updated'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-500 transform" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full" role="alert"
                class="alert alert-success bg-green-500 text-white p-4 rounded-md shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('data_updated') }}</span>
            </div>
        @endif

        @if (session('info'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                x-transition:enter="transition ease-out duration-500 transform"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-500 transform" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full" role="alert"
                class="alert alert-success bg-green-500 text-white p-4 rounded-md shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('info') }}</span>
            </div>
        @endif
    </div>

    <form wire:submit.prevent="postData" enctype="multipart/form-data">
        <div
            class="relative custom-file-input border-2 border-gray-300 border-dashed rounded-md bg-white dark:bg-gray-700 h-72 mt-4 w-full max-w-md mx-auto">
            @if (!$photo)
                <input wire:model="photo" id="filePicker" name="img" type="file"
                    class="file-input absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
            @endif

            <a class="btn bg-gray-900 absolute top-2 right-2 rounded-full btn-xs text-white {{ $photo ? '' : 'hidden' }}"
                wire:click="clearPhoto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
            <img wire:model="photo" src="{{ $photo ? $photo->temporaryUrl() : '' }}" alt="Preview"
                class="{{ $photo ? '' : 'hidden' }} m-auto h-full mt-5 object-cover rounded-md">
            <div id="fileInputOverlay" class="flex items-center justify-center h-full">
                <div class="space-y-1 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Seret atau klik file di sini</p>
                </div>
            </div>
        </div>
        @error('photo')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
        <div class="px-6 py-4 flex justify-end md:justify-center">
            <button type="submit" wire:loading.attr="disabled"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded btn {{ $photo ? '' : 'btn-disabled' }} md:px-44">Deteksi</button>
        </div>
    </form>


    @if ($disease)
        @if ($disease !== 'sehat')
            <div class="flex-grow pb-10 mt-6">
                <div class="px-6">
                    <div class="mt-10 flex justify-center">
                        <div
                            class="w-full max-w-lg sm:max-w-xl md:max-w-2xl p-4 bg-white border border-gray-200 rounded-lg shadow-lg">
                            <h5 class="mb-4 text-lg font-semibold text-green-500">Deteksi Berhasil!</h5>
                            <div class="border-b border-gray-300 py-4">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-6 h-6 mr-2 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    <div>
                                        <p class="text-gray-600">Terdeteksi Penyakit</p>
                                        <p class="text-lg text-red-500 font-semibold">{{ $disease }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center mt-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-6 h-6 mr-2 text-yellow-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4v.01m0-8V8m0 0V3a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v1m8 0h4a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-1m8 0v-4m0 4h-4m4 0l-4-4" />
                                    </svg>
                                    <div>
                                        <p class="text-gray-600">Saran</p>
                                        <p class="text-lg text-yellow-500 font-semibold">Gunakan Pestisida</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 text-gray-700">
                                <p class="mb-2">
                                    {{ $solution }}
                                </p>
                            </div>

                            <button wire:click="saveDetectionResult"
                                class="mt-6 w-full py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 cursor-pointer">
                                Simpan Deteksi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="flex-grow bg-white pb-10 mt-6">
                <div class="px-6">
                    <div class="mt-10 flex justify-center">
                        <div class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow-lg">
                            <h5 class="mb-4 text-lg font-semibold text-green-500">Tidak Terdeteksi Penyakit</h5>
                            <div class="border-b border-gray-300 py-4">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-6 h-6 mr-2 text-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    <div>
                                        <p class="text-green-600">Selamat!!, Tanaman anda sehat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="mt-6 flex w-full mx-auto" id="loadingContainer" wire:loading wire:target="postData">
            <div class="flex flex-col gap-4 w-10/12 mx-auto text-center">
                <div class="flex justify-center">
                    <h1 class="text-sm font-alata text-gray-600">Memproses hasil deteksi</h1>
                    <h1 class="loading loading-dots loading-xs mt-2 ml-1 text-gray-600"></h1>
                </div>

                <div id="loadingSkeleton" class="skeleton h-32 w-full"></div>
                <div class="skeleton h-4 w-28"></div>
                <div class="skeleton h-4 w-full"></div>
                <div class="skeleton h-4 w-full"></div>
            </div>
        </div>
    @endif
</div>
