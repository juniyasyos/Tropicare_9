@props(['value'])

<label {{ $attributes->merge(['class' => 'text-white font-semibold']) }}>
    {{ $value ?? $slot }}
</label>
