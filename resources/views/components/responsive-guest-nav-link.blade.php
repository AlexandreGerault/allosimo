@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'bg-red-900 text-white block px-3 py-2 rounded-md text-base font-medium'
                : 'text-red-300 hover:bg-red-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
