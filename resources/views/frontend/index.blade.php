@extends('layouts.frontend')
@section('title', 'Home')

@section('content')
	<div class="swiper-container slider-one-content-rounded-pagination text-center">
        <div class="swiper-wrapper">
            @foreach($banners as $banner)
            <div class="swiper-slide">
                <img src="{{ asset('banner/'.$banner->image) }}" alt=""
                width="100%" height="600px" />
            </div>
            @endforeach
        </div>
        
        <x-swiper-next icon="chevron_right_white_24dp.svg" />
        <x-swiper-prev icon="chevron_left_white_24dp.svg" />
        <x-swiper-pagination/>
    </div>

    <section class="py-5 bg-green-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 d-flex align-items-center flex-column justify-content-center">
                    <var class="font-weight-bold font-style-normal text-not-italic h3">
                        1.5K
                    </var>
                    <p class="text-purple m-0">Trusted Companies</p>
                </div>
                <div class="col-lg-8">
                    <div class="row mx-0">
                        @foreach ($companies as $company)
                        <div class="col-lg-3 overflow-hidden text-center">
                            <img src="{{ asset('images/companies/' . $company->logo) }}"
                            alt="{{ $company->name }}" height="60px" draggable="false">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-green-light py-5 position-relative">
        <img src="{{ asset('images/pattern-dot.png') }}" alt="" height="120px"
        class="pattern-bottom-left pattern-pb-5 left-0" draggable="false"/>
        <div class="container text-center">
            <x-head-section text="Program Belajar {{ config('app.name') }}" />
            <div class="position-relative">
                <div class="swiper-container slider-fifth-content text-center slider-nav-center-vertical slider-nav-outside-horizontal position-static">
                    <ul class="nav flex-nowrap nav-pills swiper-wrapper nav-pills--dark-green-active" 
                    id="categories-class-tab">
                        @foreach ($categoriesClass as $category)
                        <li class="swiper-slide nav-item d-flex align-items-center justify-content-center" role="presentation">
                            <a class="nav-link text-black @if($loop->first) font-weight-bold active @endif" 
                            id="pills-{{ Str::slug(strtolower($category->name)) }}-tab" 
                            data-toggle="pill" href="#pills-{{ Str::slug(strtolower($category->name)) }}" role="tab"
                            aria-controls="pills-{{ Str::slug(strtolower($category->name)) }}" aria-selected="@if($loop->first) true @else false @endif">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @if (count($categoriesClass) > 5)
                    <x-swiper-next class="bg-transparent" 
                    icon="chevron_right_black_24dp.svg" />
                    <x-swiper-prev class="bg-transparent" 
                    icon="chevron_left_black_24dp.svg" />
                    @endif
                </div>
            </div>

            <div class="tab-content" id="categories-class-tabContent">
                @foreach ($categoriesClass as $category)
                <div class="tab-pane fade @if($loop->first) show active @endif"
                id="pills-{{ Str::slug(strtolower($category->name)) }}" 
                role="tabpanel" aria-labelledby="pills-{{ Str::slug(strtolower($category->name)) }}-tab">
                    <div class="row justify-content-center flex-nowrap mx-0">
                        @foreach ($classes as $class)
                        <div class="col-lg-3 col-xl-4 
                            @if($loop->iteration === 2) mx-xl-5 @endif">
                            @include('includes.sub-class', ['subclass' => $class])
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('courses') }}" class="btn btn-success bg-green-dark mt-4">
                Lihat semua
            </a>
        </div>
    </section>
    
    <section id="cerita-alumni" class="py-3">
        <x-head-section text="Cerita Alumni Volans Education" />
        <div class="container">
            <div class="row">
                @foreach ($videos as $story)
                <div class="col-lg-3">
                    <div class="card bg-transparent h-full border-0 shadow-none">
                        <div class="position-relative play-popup rounded overflow-hidden">
                            <img src="{{ asset('blog/1.jpg') }}" class="card-img-top" 
                            alt="{{ $story->name }}"/>
                            <div class="overlay overlay--black-point-3"></div>
                            <a href="javascript:void(0);" class="play-popup__btn"
                            data-fancybox data-type="iframe" 
                            data-src="{{ Str::of($story->video)->replace(
                                'watch?v=', 'embed/'
                            ) }}?autoplay=1&origin={{ config('app.url') }}">
                                <img src="{{ asset('images/btn-play.png') }}" 
                                alt="" height="90px"/>
                            </a>
                        </div>
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title font-weight-bold
                            card-title--elipsis-one-row">
                                {{ $story->name }}
                            </h5>
                            <p class="card-text">
                                {{ Str::words($story->description, 8) }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="bg-white-to-green-light">
        <section id="testimoni" class="py-3">
            <div class="container">
                <x-head-section text="Jadilah Pemenang Bersama Volans" />
    
                <div class="swiper-container slider-arrow-pagination-three-slide pb-5" id="slider-testi">
                    <div class="swiper-wrapper align-items-stretch">
                        @foreach($testimonials as $testi)
                        <div class="swiper-slide h-auto d-flex flex-column align-items-center">
                            <img src="{{ asset('images/' . $testi->image) }}" 
                            class="rounded-circle object-cover" height="200px" width="200px" 
                            alt="{{ $testi->name }}">
                            <div class="card mt-n5 z-n1 pt-5 bg-green-normal-to-darker text-white fg-1">
                                <div class="card-body mt-2 px-4">
                                    <div class="card-text">
                                        {!! nl2br($testi->testimonial) !!}
                                    </div>
                                    <h5 class="card-title mt-4 mb-0">{{ $testi->name }}</h5>
                                    <small>{{ $testi->from }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @include('includes.swiper-nav-arrow')
                </div>
            </div>
        </section>
    
        <section id="our-tutor" class="py-3 position-relative">
            <img src="{{ asset('images/pattern-dot.png') }}" alt="" width="140px"
            class="pattern-bottom-left pattern-bottom-left--half-minus left-10" draggable="false">
            <div class="container">
                <x-head-section text="Belajar Seru Bareng Master Tutor Volans Education" />
                <div class="swiper-container slider-arrow-pagination-three-slide pb-5" id="slider-tutor">
                    <div class="swiper-wrapper align-items-stretch">
                        @foreach($tutors as $tutor)
                        <div class="swiper-slide h-auto d-flex flex-column align-items-center">
                            <div class="author_img">
                                <img src="{{ asset('images/'.$tutor->image) }}" alt="" width="200px" height="200px" class="rounded-circle">
                            </div>
                            <br>
                            <span style="font-family:'Poppins', sans-serif">
                                <strong>{{ $tutor->name }}</strong>
                            </span>
                            <br>
                            <span style="font-family:'Poppins', sans-serif">
                                <strong>{{ $tutor->field }}</strong>
                            </span>
                            <p style="margin-bottom:100px;font-family:'Poppins', sans-serif">
                                {{ $tutor->from }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                    @include('includes.swiper-nav-arrow')
                </div>
            </div>
        </section>
    </div>

    <section class="py-5">
        <div class="container">
            <x-head-section text="Kenapa Harus Memilih Volans Education?"/>
            <div class="row">
                @foreach($advantages as $advantage)
                <div class="col-lg-6 px-1 @if(!$loop->last and 
                $loop->iteration != count($advantages) - 1) mb-2 @endif">
                    <div class="position-relative hide-overlay-on-hover">
                        <img src="{{ asset('advantage/'.$advantage->image)}}" width="100%" height="250px" class="object-cover">
                        <div class="overlay-content text-center text-white font-weight-bold">
                            {{ $advantage->name }}
                        </div>
                        <div class="overlay overlay--black-point-5"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
    @include('includes.subscribe')

    @include('includes.latest-news')

@endsection