@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg  md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline'
            :'px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg  md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

