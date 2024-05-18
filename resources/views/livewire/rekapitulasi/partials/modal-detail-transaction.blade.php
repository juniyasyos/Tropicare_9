<div class="flex justify-center bg-white pb-10">
    <dialog id="editFormDataTransaction" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg mb-5">Edit Nota</h3>
            <form method="dialog">
                <button class="absolute top-2 right-2" onclick="closeEditModal()">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
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
                        <input type="text" id="id_list" name="id_list"
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

                    <div class="flex justify-end space-x-4">
                        <button type="button" class="btn btn-outline btn-error"
                            onclick="closeEditModal()">Close</button>
                        <button type="submit" class="btn btn-success text-white bg-green-500">Kirim</button>
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
