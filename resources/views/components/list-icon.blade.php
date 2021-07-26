<li {{ $attributes->merge(['class' => 'mb-3']) }}>
    <img src="{{ asset('images/icon/' . $icon) }}" alt="{{ $text }}">
    <span>{{ $text }}</span>
    {{ $slot }}
</li>