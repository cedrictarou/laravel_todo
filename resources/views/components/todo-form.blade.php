<form method="{{ $method }}" action="{{ $action }}"
    {{ $attributes->merge(['class' => 'flex gap-1 justify-around text-center']) }}>
    @csrf
    {{ $slot }}
</form>
