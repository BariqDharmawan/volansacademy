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
        <x-bg-section height="120px" class="pattern-pb-5 left-0" />
        <div class="container text-center">
            <x-head-section text="Program Belajar {{ config('app.name') }}" />
            @include('includes.sub-class-category')

            <div class="tab-content" id="categories-class-tabContent">
                @foreach ($classes as $class)
                <div class="tab-pane fade @if($loop->first) show active @endif"
                id="pills-{{ Str::slug(strtolower($class->name)) }}" 
                role="tabpanel" 
                aria-labelledby="pills-{{ Str::slug(strtolower($class->name)) }}-tab">
                    <div class="row justify-content-center flex-nowrap mx-0">
                        @foreach ($class->subclasses->take(3) as $subclass)
                        <div class="col-lg-3 col-xl-4 
                            @if($loop->iteration === 2) mx-xl-5 @endif">
                            @include('includes.sub-class')
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
                            <img src="{{ asset('video/' . $story->image) }}" 
                            class="card-img-top" 
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
        <section id="testimoni-kita" class="py-3">
            <div class="container">
                <x-head-section text="Jadilah Pemenang Bersama Volans" />
    
                <div class="swiper-container slider-arrow-pagination-three-slide pb-5" id="slider-testi">
                    <div class="swiper-wrapper align-items-stretch">
                        @foreach($testimonials as $testi)
                        <div class="swiper-slide h-auto d-flex flex-column align-items-center">
                            <img src="{{ asset('images/' . $testi->image) }}" 
                            class="rounded-circle object-cover" height="200px" width="200px" 
                            alt="{{ $testi->name }}">
                            <div class="card mt-n5 z-n1 pt-5 bg-green-normal-to-darker 
                            text-white fg-1">
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
    
        <section id="tutor-kita" class="py-3 position-relative">
            <x-bg-section width="190px" class="pattern-bottom-left--half-minus left-10" />
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
                            <span class="text-poppins">
                                <strong>{{ $tutor->name }}</strong>
                            </span>
                            <br>
                            <span class="text-poppins">
                                <strong>{{ $tutor->field }}</strong>
                            </span>
                            <p class="text-poppins">
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