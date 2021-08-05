<div class="position-relative">
    <div class="swiper-container slider-fifth-content text-center slider-nav-center-vertical slider-nav-outside-horizontal position-static">
        <ul class="nav flex-nowrap nav-pills swiper-wrapper nav-pills--dark-green-active" 
        id="categories-class-tab">
            @foreach ($classes as $class)
            <li class="swiper-slide nav-item d-flex align-items-center justify-content-center" role="presentation">
                <a class="nav-link text-black @if($loop->first) font-weight-bold active @endif" 
                id="pills-{{ Str::slug(strtolower($class->name)) }}-tab" 
                data-toggle="pill" href="#pills-{{ Str::slug(strtolower($class->name)) }}" role="tab"
                aria-controls="pills-{{ Str::slug(strtolower($class->name)) }}" aria-selected="@if($loop->first) true @else false @endif">
                    {{ $class->name }}
                </a>
            </li>
            @endforeach
        </ul>
        @if (count($classes) > 5)
        <x-swiper-next class="bg-transparent" 
        icon="chevron_right_black_24dp.svg" />
        <x-swiper-prev class="bg-transparent" 
        icon="chevron_left_black_24dp.svg" />
        @endif
    </div>
</div>