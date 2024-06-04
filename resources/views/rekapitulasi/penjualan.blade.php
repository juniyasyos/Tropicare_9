<x-app-layout>
    <x-slot name="header">
        <div class="navbar sm:block md:hidden lg:hidden pt-2 bg-white border border-gray-300">
            <div class="navbar-start">
                <a href="{{ route('rekapitulasi.show') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="navbar-center">
                <a class="btn btn-ghost text-lg">Penjualan</a>
            </div>
            <div class="navbar-end">
            </div>
        </div>
    </x-slot>

    <div class="md:p-4 md:ml-64">
        <div class="bg-white rounded-lg">
            <div class="pt-6 pb-3">
                <div class="text-center sm:text-left ml-4">
                    <div class="text-sm breadcrumbs hidden md:block lg:block">
                        <ul>
                            <li>
                                <a href="{{ route('dashboard') }}" class="font-semibold text-lg">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('rekapitulasi.show') }}" class="text-lg font-semibold">
                                    Rekapitulasi
                                </a>
                            </li>
                            <li>
                                <h1 class="text-lg">
                                    Penjualan
                                </h1>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container mx-auto md:p-6 mt-[-20px]">
                <livewire:rekapitulasi.penjualan-section />
            </div>
        </div>
    </div>
    <x-slot name="AddScript">
        <script>
            function showTransactionEdit(transaction) {
                const modalEdit = document.getElementById('editFormDataTransaction');
                document.getElementById('id_list').value = transaction.TransactionID;
                document.getElementById('id_delete').value = transaction.TransactionID;

                document.getElementById('nama_barang').value = transaction.NameObject;
                document.getElementById('tanggal').value = transaction.TransactionDate;
                document.getElementById('barang_kg').value = transaction.Quantity;
                document.getElementById('harga_per_pcs').value = (transaction.PricePerKg * 1).toFixed(0);
                document.getElementById('amount').value = (transaction.PricePerKg * transaction.Quantity).toFixed(0);

                // Mengisi teks pada elemen <p> atau <span>
                document.getElementById('nama_barang_del').textContent = transaction.NameObject;
                document.getElementById('tanggal_del').textContent = transaction.TransactionDate;
                document.getElementById('barang_kg_del').textContent = transaction.Quantity;
                document.getElementById('harga_per_pcs_del').textContent = (transaction.PricePerKg * 1).toFixed(0);

                modalEdit.showModal();
            }

            function closeEditModal() {
                const modal = document.getElementById('editFormDataTransaction');
                modal.close();
            }

            function showDeleteModal() {
                const modal = document.getElementById('deleteFormDataTransaction');
                modal.showModal();
            }

            function closeDeleteModal() {
                const modal = document.getElementById('deleteFormDataTransaction');
                modal.close();
            }
        </script>
    </x-slot>
</x-app-layout>
