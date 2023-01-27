@props([
    'btn' => 'button',
    'color' => 'add',
])

@php
    switch ($color) {
        case 'add':
            $addClass = 'bg-indigo-400';
            break;
        case 'delete':
            $addClass = 'bg-gray-400';
            break;
        case 'update':
            $addClass = 'bg-indigo-400';
            break;
        case 'logout':
            $addClass = 'bg-gray-400';
            break;
            defalut:
            $addClass = 'bg-indigo-400';
            break;
    }
@endphp

<button
    {{ $attributes->merge(['class' => 'items-center px-3 py-1.5 transition duration-500 ease-in-out	' . $addClass . ' text-white rounded-md']) }}
    type="submit">
    {{ $btn }}
</button>
