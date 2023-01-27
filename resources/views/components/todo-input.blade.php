<input type="text" name="{{ $name }}" value="{{ $value ?? '' }}" placeholder="{{ $placeHolder ?? '' }}"
    {{ $attributes->merge(['class' => 'px-2 py-2 border rounded w-full']) }}>
