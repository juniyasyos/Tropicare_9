    <!-- Dekstop sidebar -->
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 md:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto mt-24 bg-white dark:bg-gray-800 rounded-lg">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-gray-900 rounded-ld hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="far fa-home text-base pt-1 mb-1 block"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center p-2 text-gray-900 rounded-ld hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="far fa-user text-base pt-1 mb-1 block"></i>
                        <span class="ms-4">Profiles</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
