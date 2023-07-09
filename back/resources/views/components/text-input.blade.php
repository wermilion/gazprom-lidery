@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gazprom-500 dark:focus:border-gazprom-500 focus:ring-gazprom-500 dark:focus:ring-gazprom-600 shadow-sm']) !!}>
