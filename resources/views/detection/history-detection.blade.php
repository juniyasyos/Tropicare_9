<x-app-layout>
    <x-slot name="header">
        <div class="navbar sm:block md:hidden lg:hidden bg-white">
            <div class="navbar-start">
                <a href="{{ route('rekapitulasi.show') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" id="back">
                        <path
                            d="M22,15H12.41l2.3-2.29a1,1,0,0,0-1.42-1.42l-4,4a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l4,4a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L12.41,17H22a1,1,0,0,0,0-2Z">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="navbar-center mt-5">
                <a class="btn btn-ghost text-lg">Histori Deteksi</a>
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
                                <a href="{{ route('rekapitulasi.show') }}" class="font-semibold text-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"
                                        id="back">
                                        <path
                                            d="M22,15H12.41l2.3-2.29a1,1,0,0,0-1.42-1.42l-4,4a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l4,4a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L12.41,17H22a1,1,0,0,0,0-2Z">
                                        </path>
                                    </svg>
                                </a>
                                <h1 class="font-semibold text-lg">
                                    Dashboard
                                </h1>
                            </li>
                            <li>
                                <a class="text-lg font-semibold">
                                    Deteksi
                                </a>
                            </li>
                            <li>
                                <a class="text-lg">
                                    Histori Deteksi
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container mx-auto md:p-6 mt-[-20px]">
                <livewire:detection.history-section />
            </div>
        </div>
    </div>
    <x-slot name="AddScript">
        <script>
            function toggleModal(detectionId) {
                var modal = document.getElementById('modal-' + detectionId);
                modal.classList.toggle('hidden');
            }

            function deleteDetection(detectionId) {
                var modal = document.getElementById('delete-modal-' + detectionId);
                var ariaHidden = modal.getAttribute('aria-hidden');

                if (ariaHidden === 'true') {
                    modal.classList.remove('hidden');
                    modal.setAttribute('aria-hidden', 'false');
                } else {
                    modal.classList.add('hidden');
                    modal.setAttribute('aria-hidden', 'true');
                }
            }
        </script>
    </x-slot>
</x-app-layout>
