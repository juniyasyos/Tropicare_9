<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary relative flex h-11 w-full items-center justify-center px-6 mt-14 rounded-full text-white font-bold text-[16px] bg-gray-900 font-inter hover:bg-white hover:text-gray-900 hover:border-2 hover:border-gray-900 focus:ring-offset-2 transition ease-in-out duration-150 border-none']) }}>
    {{ $slot }}
</button>
