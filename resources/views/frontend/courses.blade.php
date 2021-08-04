@extends('layouts.frontend')
@section('title', 'Program Belajar')

@section('content')

    <section class="py-5 bg-green-light">
        <div class="container">
            <x-head-section text="Program Belajar {{ config('app.name') }}" />
            <div class="row">
                <div class="col-lg-6">
                    <div class="position-relative play-popup rounded overflow-hidden shadow">
                        <img src="{{ asset('blog/1.jpg') }}" class="card-img-top" 
                        alt=""/>
                        <div class="overlay overlay--black-point-3"></div>
                        <a href="javascript:void(0);" class="play-popup__btn"
                        data-fancybox data-type="iframe" 
                        data-src="{{ Str::of('https://www.youtube.com/watch?v=48CzgahwtwY')->replace(
                            'watch?v=', 'embed/'
                        ) }}?autoplay=1&origin={{ config('app.url') }}">
                            <img src="{{ asset('images/btn-play.png') }}" 
                            alt="" height="90px"/>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 class="font-weight-bold">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et sequi soluta sint eveniet illum error earum <b>perferendis</b> 
                        voluptas dolores impedit!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="all-course" class="py-5">
        <div class="container">
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

            <h4 class="my-4 font-weight-bold text-center">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. <br> 
                Odio omnis delectus saepe quisquam optio nobis.
            </h4>

            <div class="tab-content" id="categories-class-tabContent">
                @foreach ($classes as $class)
                <div class="tab-pane fade @if($loop->first) show active @endif"
                id="pills-{{ Str::slug(strtolower($class->name)) }}" 
                role="tabpanel" 
                aria-labelledby="pills-{{ Str::slug(strtolower($class->name)) }}-tab">
                    <div class="row justify-content-center mx-0">
                        @foreach ($class->subclasses as $subclass)
                        <div class="col-lg-3 mb-3">
                            @include('includes.sub-class')
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('includes.subscribe')
    @include('includes.latest-news')

@endsection