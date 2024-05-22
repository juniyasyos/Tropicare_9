<div class="flex justify-center bg-white pb-10">
    <dialog id="modalAddNota" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg mb-5">Buat nota baru</h3>
            <div class="py-4">
                <form method="POST" action="{{ route('penjualan.add') }}">
                    @csrf <div class="mb-4">
                        <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama
                            Barang</label>
                        <input type="text" id="nama_barang" name="nama_barang" value="Pepaya California"
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>"
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="barang_kg" class="block text-sm font-medium text-gray-700">Jumlah Barang per
                            Kg</label>
                        <input type="number" id="barang_kg" name="barang_kg"
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="harga_per_pcs" class="block text-sm font-medium text-gray-700">Harga Per
                            Kg</label>
                        <input type="number" id="harga_per_pcs" name="harga_per_pcs" step="0.01"
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="button" class="btn w-3/12 btn-outline btn-error" onclick="modalAddNota.close()">Keluar</button>
                        <button type="submit" class="btn w-3/12 btn-success text-white bg-green-500">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>
</div>
