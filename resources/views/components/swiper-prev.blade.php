<div {{ $attributes->merge(['class' => 'swiper-button-prev']) }}>
    @isset($icon)
    <img src="{{ asset('images/icon/' . $icon) }}" alt="" height="{{ $height }}">
    @endisset
    {{ $slot }}
</div>