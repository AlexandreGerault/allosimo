@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'bg-red-900 text-white px-3 py-2 rounded-md text-sm font-medium'
                : 'text-white hover:bg-red-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium';
@endphp

<a {{ $attributes->merge(['class' => 'transition duration-200 ' . $classes]) }}>
    {{ $slot }}
</a>
