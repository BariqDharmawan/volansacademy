<li>
    <a href="{{ $link }}" 
        @if($isHideOnDesktop)
        {{ $attributes->merge(['class' => 'link text-black mobile-menu d-none']) }}
        @else
        {{ $attributes->merge(['class' => 'link text-black']) }}
        @endif
    >
        {{ $slot }}
    </a>
</li>