@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-block p-4 w-full text-blue-600 bg-gray-50 rounded-tl-lg hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600'
            : 'inline-block p-4 w-full active:text-blue-600 bg-gray-50 rounded-tl-lg hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600';
@endphp

<li class="w-full">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>

