<select name="{{ $name }}" {{ $attributes->merge(['class' => 'rounded focus:text-gray-800  text-gray-500']) }}>
    {{ $slot }}
</select>
