@props([
    'disabled' => false,
])
<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => ' py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
        focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
        dark:text-gray-300 dark:focus:ring-offset-dark-eval-1',
]) !!} cols="20" rows="10">{{ $slot }}</textarea>
