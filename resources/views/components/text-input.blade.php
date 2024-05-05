@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'focus:outline-none block w-full bg-white rounded-md border border-gray-200 bg-transparent px-4 py-3 text-black transition duration-300 invalid:ring-2 invalid:ring-red-400 focus:ring-2 focus:ring-cyan-300']) !!}>
