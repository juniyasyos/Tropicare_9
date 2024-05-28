<div class="flex justify-center bg-white pb-10">
    <dialog id="editFormDataTransaction" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg mb-5">Edit Nota</h3>
            <form method="dialog">
                <button class="absolute top-2 right-2" onclick="closeEditModal()">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </form>
            <div class="py-4">
                <form id="editForm" method="POST" action="{{ route('penjualan.edit') }}">
                    @csrf
                    <div class="mb-4 hidden">
                        <label for="id_list" class="block text-sm font-medium text-gray-700">id</label>
                        <input type="number" id="id_list" name="id_list"
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                        <input type="text" id="nama_barang" name="nama_barang"
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal"
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="barang_kg" class="block text-sm font-medium text-gray-700">Jumlah Barang per
                            Kg</label>
                        <input type="number" id="barang_kg" name="barang_kg"
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="harga_per_pcs" class="block text-sm font-medium text-gray-700">Harga Per Kg</label>
                        <input type="number" id="harga_per_pcs" name="harga_per_pcs" step="0.01"
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-700">Total</label>
                        <input type="number" id="amount" name="amount" step="0.01" disabled
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>

                    <div class="flex justify-center space-x-4 w-full px-2">
                        <button type="button" onclick="showDeleteModal()"
                            class="btn btn-error text-white bg-red-500 w-1/2">Hapus</button>
                        <button type="submit" class="btn btn-success text-white bg-green-500 w-1/2">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>

    <dialog id="deleteFormDataTransaction" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="absolute top-2 right-2" onclick="closeDeleteModal()">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </form>
            <div class="my-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 fill-red-500 inline" viewBox="0 0 24 24">
                    <path
                        d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                        data-original="#000000" />
                    <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                        data-original="#000000" />
                </svg>
                <h4 class="text-xl font-semibold mt-6 text-red-600">Kamu yakin akan menghapus data?</h4>
                <div class="mt-4 text-left">
                    <table class="w-full text-left text-gray-700">
                        <tbody>
                            <tr class="border-b">
                                <th class="py-2 font-bold">Nama Barang</th>
                                <td id="nama_barang_del" class="py-2 font-medium">[Nama Barang]</td>
                            </tr>
                            <tr class="border-b">
                                <th class="py-2 font-bold">Tanggal</th>
                                <td id="tanggal_del" class="py-2 font-medium">[Tanggal]</td>
                            </tr>
                            <tr class="border-b">
                                <th class="py-2 font-bold">Berat Barang (kg)</th>
                                <td id="barang_kg_del" class="py-2 font-medium">[Berat Barang]</td>
                            </tr>
                            <tr>
                                <th class="py-2 font-bold">Harga per Kg</th>
                                <td id="harga_per_pcs_del" class="py-2 font-medium">[Harga per Pcs]</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="py-4">
                <form id="deleteForm" method="POST" action="{{ route('penjualan.del') }}">
                    @csrf
                    <div class="mb-4 hidden">
                        <label for="id_delete" class="block text-sm font-medium text-gray-700">id</label>
                        <input type="number" id="id_delete" name="id_delete"
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="submit" class="btn btn-success text-white bg-green-500">Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>
    {{-- @if (session('data_updated'))
        <div class="alert alert-success">
            {{ session('data_updated') }}
        </div>
    @endif

    @if ($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif   --}}
</div>
