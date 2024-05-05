<div>
    <form wire:submit.prevent="upload" enctype="multipart/form-data">
        <div class="custom-file-input border-2 border-gray-300 border-dashed rounded-md bg-white h-64 mt-4 w-80 mx-auto">
            <input wire:model="photo" id="filePicker" name="img" type="file" class="file-input" accept="image/*">
            <img wire:model="photo" src="{{ $photo ? $photo->temporaryUrl() : '' }}" alt="Preview"
                class="{{ $photo ? '' : 'hidden' }}">
            <div id="fileInputOverlay" class="flex items-center justify-center h-full">
                <div class="space-y-1 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <p class="text-sm text-gray-600">Seret atau klik file di sini</p>
                </div>
            </div>
        </div>
        @error('photo')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
        <div class="px-6 py-4 flex justify-end">
            <button type="submit" wire:click="uploadImage"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Deteksi</button>
        </div>
    </form>

    @if ($result_photo)
        {{-- Periksa apakah file ada di dalam direktori penyimpanan --}}
        @if (Storage::exists($result_photo))
            <div class="flex-grow bg-gray-100 pb-10 mt-6">
                <div class="px-6">
                    <div class="flex justify-center">
                        <figure class="max-w-lg mx-auto">
                            <img class="h-auto max-w-full rounded-lg" src="{{ asset($result_photo) }}" alt="image description">
                            <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">{{ $result_photo }}</figcaption>
                        </figure>
                    </div>

                    <div class="mt-10 flex justify-center">
                        <div class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow-lg">
                            <h5 class="mb-4 text-lg font-semibold text-green-500">Deteksi Berhasil!</h5>
                            <div class="border-b border-gray-300 py-4">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-6 h-6 mr-2 text-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    <div>
                                        <p class="text-gray-600">Terdeteksi</p>
                                        <p class="text-lg text-blue-500 font-semibold">2 Daun</p>
                                    </div>
                                </div>
                                <div class="flex items-center mt-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-6 h-6 mr-2 text-green-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7m-7-7v14" />
                                    </svg>
                                    <div>
                                        <p class="text-gray-600">Status Daun</p>
                                        <p class="text-lg text-green-500 font-semibold">Terserang Hama Tepung</p>
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
                                <p class="mb-2">Setelah melakukan analisis, ditemukan bahwa 2 daun mengalami kondisi
                                    sakit.
                                    Kami merekomendasikan tindakan pengobatan dan perawatan yang tepat untuk mengatasi
                                    masalah ini.</p>
                                <p class="mb-2">Perawatan yang tepat dapat membantu memulihkan kondisi tanaman pepaya
                                    Anda
                                    dan mencegah penyebaran penyakit lebih lanjut.</p>
                                <p>Silakan simpan hasil ini untuk referensi dan lakukan langkah-langkah yang diperlukan
                                    segera.</p>
                            </div>

                            <button
                                class="mt-6 w-full py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                Simpan Deteksi
                            </button>
                        </div>
                    </div>

                </div>

            </div>
            <img src="{{ Storage::url($result_photo) }}" alt="Result Photo">
        @else
            <div class="mt-6 flex w-full mx-auto" id="loadingContainer" wire:target="upload">
                <div class="flex flex-col gap-4 w-10/12 mx-auto text-center">
                    <div class="flex justify-center">
                        <h1 class="text-sm font-alata text-gray-600">Memproses Gambar</h1>
                        <h1 class="loading loading-dots loading-xs mt-2 ml-1 text-gray-600"></h1>
                    </div>

                    <div id="loadingSkeleton" class="skeleton h-32 w-full"></div>
                    <div class="skeleton h-4 w-28"></div>
                    <div class="skeleton h-4 w-full"></div>
                    <div class="skeleton h-4 w-full"></div>
                </div>
            </div>
        @endif
    @endif
</div>
