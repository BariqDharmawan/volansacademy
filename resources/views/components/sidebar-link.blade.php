<li class="nav-item">
    <a href="{{ route($href) }}" class="nav-link">
        <i class="nav-icon fas {{ $bootstrapIcon }}"></i>
        <p>{{ $text }}</p>
    </a>
    {{ $slot }}
</li>