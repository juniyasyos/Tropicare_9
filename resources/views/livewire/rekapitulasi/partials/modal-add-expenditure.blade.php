<div class="flex justify-center bg-white pb-10">
    <dialog id="modalAddExpenditure" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg mb-5">Buat Data Pengeluaran Baru</h3>
            <div class="py-4">
                <form method="POST" action="{{ route('pengeluaran.add') }}">
                    @csrf <div class="mb-4">
                        <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama
                            Pengeluaran</label>
                        <input type="text" id="nama_barang" name="nama_barang"
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>"
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Tulis deskripsi mengenai pengeluaran anda..." required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah Pengeluaran</label>
                        <input type="number" id="amount" name="amount" step="0.01"
                            class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="button" class="btn w-3/12 btn-outline btn-error"
                            onclick="modalAddExpenditure.close()">Keluar</button>
                        <button type="submit" class="btn w-3/12 btn-success text-white bg-green-500">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>
</div>
