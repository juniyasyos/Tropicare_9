<div class="w-full max-w-md mx-auto fixed bottom-0 inset-x-0 md:hidden lg:hidden">
    <div class="px-5 bg-white shadow-lg rounded-xl">
        <div class="flex">
            <div class="flex-1 group">
                <a href="{{ route('dashboard') }}"
                    class="flex items-end justify-center text-center mx-auto px-3 py-1 w-full text-gray-400 group-hover:text-indigo-500 border-b-2 border-transparent group-hover:border-indigo-500">
                    <span class="block px-1 pt-1 pb-1">
                        <i class="far fa-home text-base pt-1 mb-1 block"></i>
                        <span class="block text-xs">Home</span>
                    </span>
                </a>
            </div>
            <div class="flex-1 group">
                <a href="#"
                    class="flex items-end justify-center text-center mx-auto px-3 py-1 w-full text-gray-400 group-hover:text-indigo-500 border-b-2 border-transparent group-hover:border-indigo-500">
                    <span class="block px-1 pt-1 pb-1">
                        <i class="far fa-add text-base pt-1 mb-1 block"></i>
                        <span class="block text-xs">History</span>
                    </span>
                </a>
            </div>
            <div class="flex-1 group">
                <a href="{{ route('profile.edit') }}"
                    class="flex items-end justify-center text-center mx-auto px-3 py-1 w-full text-gray-400 group-hover:text-indigo-500 border-b-2 border-transparent group-hover:border-indigo-500">
                    <span class="block px-1 pt-1 pb-1">
                        <i class="far fa-user text-base pt-1 mb-1 block"></i>
                        <span class="block text-xs">Profile</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
