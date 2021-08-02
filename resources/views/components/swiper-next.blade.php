<div {{ $attributes->merge(['class' => 'swiper-button-next']) }}>
    @isset($icon)
    <img src="{{ asset('images/icon/' . $icon) }}" alt="" height="{{ $height }}">
    @endisset
    {{ $slot }}
</div>