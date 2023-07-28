@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-gazprom-500 focus:ring-gazprom-500 shadow-sm']) !!}>
