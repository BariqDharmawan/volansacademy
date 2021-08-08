<nav class="nav bg-green-light">
    <div class="container d-flex align-items-center px-lg-0">
        <a href="{{ route('home') }}">
            <img src="{{ asset('frontend/img/logo.png')}}"  
            width="85px" alt="{{ config('app.name') }}">
        </a>
        <ul class="nav__menu ml-4">
            <x-nav-link class="{{ request()->segment(1) == '' ? 'active' : '' }} 
            text-black mr-4" link="{{ route('home') }}">
                Home
            </x-nav-link>
            <x-nav-link
            class="{{ request()->segment(1) == 'courses' 
            or request()->segment(1) == 'subcourses' 
            or request()->segment(1) == 'course'
            ? 'active' : '' }} mr-4" link="{{ route('courses') }}">
                Program
            </x-nav-link>
            <x-nav-link link="{{ route('home') }}#cerita-alumni" class="mr-4">
                Alumni
            </x-nav-link>
            <x-nav-link link="{{ route('home') }}#testimoni-kita" class="mr-4">
                Testimoni
            </x-nav-link>
            <x-nav-link link="{{ route('home') }}#tutor-kita" class="mr-4">
                Tutor
            </x-nav-link>
            <x-nav-link :is-hide-on-desktop="true" class="mr-4">
                &nbsp;
            </x-nav-link>
            @auth
            <x-nav-link class="login mr-4" 
            link="{{ route('cart') }}" :is-hide-on-desktop="true">
                Keranjang
            </x-nav-link>
            <x-nav-link link="{{route('dashboard')}}" class="mr-4" :is-hide-on-desktop="true">
                {{ auth()->user()->name }}
            </x-nav-link>
            @else
            <x-nav-link class="login popup-with-form" class="mr-4" link="#login-form mr-4" :is-hide-on-desktop="true">
                Masuk/Daftar
            </x-nav-link>
            @endauth
        </ul>
        <a class="btn btn-success bg-green-dark" href="https://wa.me/6289699505992">
            <span>Kontak</span>
        </a>
    </div>
</nav>
