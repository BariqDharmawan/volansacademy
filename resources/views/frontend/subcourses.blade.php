@extends('layouts.frontend')
@section('title', 'Home')

@section('content')
    <header class="rectangular-banner rectangular-banner--80vh w-100"
    style="background-image: url('{{ asset('subclass/'. $subclass->banner) }}')"></header>

    <section class="py-5 mb-5 bg-green-light">
        <div class="container">
            <div class="row mb-4">
                <div class="rectangular-banner flex-grow-1 h-auto" 
                style="background-image: url({{ asset('subclass/' . $subclass->detail_info_program) }})"></div>
                <div class="pl-lg-3 col-12 col-lg-auto pr-lg-0">
                    <div class="rectangle-banner rectangle-banner--big mb-3" 
                    style="background-image: url('{{ asset('subclass/' . $subclass->garansi_program) }}')"></div>
                    <div class="rectangle-banner rectangle-banner--big" 
                    style="background-image: url('{{ asset('subclass/' . $subclass->garansi_program_2) }}')"></div>
                </div>
            </div>
            <div class="row justify-content-center mb-5">
                <figure class="mr-3 d-flex flex-column rectangle-banner-box">
                    <img src="{{ asset('subclass/' . $subclass->gambar_profesi_1) }}" 
                    alt="" class="rectangle-banner rounded" />
                    <figcaption class="pt-2 text-center">
                        <p class="font-weight-bold">Profesi 1</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </figcaption>
                </figure>
                <figure class="d-flex flex-column rectangle-banner-box">
                    <img src="{{ asset('subclass/' . $subclass->gambar_profesi_2) }}" 
                    alt="" class="rectangle-banner rounded" />
                    <figcaption class="pt-2 text-center">
                        <p class="font-weight-bold">Profesi 2</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </figcaption>
                </figure>
            </div>

            <div class="rectangular-banner rectangular-banner--small w-100 rounded mb-5"
            style="background-image: url(
                {{ asset('subclass/' . $subclass->banner_konfirmasi) }}
            )"></div>

            <div class="row flex-column align-items-center">
                <div class="col-8">
                    <a href="" class="btn btn-lg bg-green-dark text-white py-3 w-100 mb-5 shadow-lg">
                        DAFTAR SEKARANG
                    </a>
                </div>
                <div class="col-5">
                    <a href="" class="btn btn-lg bg-green-obvious text-white py-2 w-100">
                        Konsultasi dulu deh <img src="{{ asset('images/icon/whatsapp.svg') }}" height="20px" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <div class="rectangle-banner rectangle-banner--bigger w-100 rounded mb-5" 
            style="background-image: url(
                {{ asset('subclass/' . $subclass->fasilitas_program
            ) }})"></div>
            <div class="rectangular-banner rectangular-banner--normal w-100 rounded mb-5"
            style="background-image: url(
                {{ asset('subclass/' . $subclass->banner_konfirmasi) }}
            )"></div>
            <div class="rectangle-banner rectangle-banner--bigger w-100 rounded mb-5" 
            style="background-image: url(
                {{ asset('subclass/' . $subclass->fasilitas_bimbel
            ) }})"></div>
            <div class="rectangular-banner rectangular-banner--small w-100 rounded mb-5"
            style="background-image: url(
                {{ asset('subclass/' . $subclass->lokasi_belajar) }}
            )"></div>

            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="card bg-transparent h-full border-0 shadow-none">
                        <div class="position-relative play-popup rounded overflow-hidden">
                            <img src="{{ asset('video/' . $subclass->thumbnail_video_alumni_testi_1) }}" 
                            class="card-img-top" alt="" height="200px" />
                            <div class="overlay overlay--black-point-3"></div>
                            <a href="javascript:void(0);" class="play-popup__btn"
                            data-fancybox data-type="iframe" 
                            data-src="{{ Str::of('https://www.youtube.com/watch?v=W2LZbcYRUxs')->replace(
                                'watch?v=', 'embed/'
                            ) }}?autoplay=1&origin={{ config('app.url') }}">
                                <img src="{{ asset('images/btn-play.png') }}" 
                                alt="" height="90px"/>
                            </a>
                        </div>
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title font-weight-bold
                            card-title--elipsis-one-row">
                                Alumni 1
                            </h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-transparent h-full border-0 shadow-none">
                        <div class="position-relative play-popup rounded overflow-hidden">
                            <img src="{{ asset('video/' . $subclass->thumbnail_video_alumni_testi_2) }}" 
                            class="card-img-top" alt="" height="200px" />
                            <div class="overlay overlay--black-point-3"></div>
                            <a href="javascript:void(0);" class="play-popup__btn"
                            data-fancybox data-type="iframe" 
                            data-src="{{ Str::of('https://www.youtube.com/watch?v=W2LZbcYRUxs')->replace(
                                'watch?v=', 'embed/'
                            ) }}?autoplay=1&origin={{ config('app.url') }}">
                                <img src="{{ asset('images/btn-play.png') }}" 
                                alt="" height="90px"/>
                            </a>
                        </div>
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title font-weight-bold
                            card-title--elipsis-one-row">
                                Alumni 1
                            </h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <a href="" class="btn btn-lg bg-green-dark text-white py-3 w-100 mt-5 shadow-lg">
                        DAFTAR SEKARANG
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 bg-green-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="rectangular-banner rectangular-banner--normal w-100 rounded mb-5"
                    style="background-image: url(
                        {{ asset('subclass/' . $subclass->banner_tagline) }}
                    )"></div>
                    
                    {{-- data semetara --}}
                    <div class="rectangular-banner rectangular-banner--normal w-100 rounded mb-5"
                    style="background-image: url(
                        {{ asset('subclass/' . $subclass->banner_tagline) }}
                    )"></div>
        
                    {{-- data sementara --}}
                    <div class="swiper-container slider-one-content-rounded-pagination text-center mb-5">
                        <div class="swiper-wrapper">
                            @for($i = 0; $i < 3; $i++)
                            <div class="swiper-slide">
                                <img src="{{ asset('subclass/1.jpg') }}" alt=""
                                width="100%" height="350px" />
                            </div>
                            @endfor
                        </div>
                        
                        <x-swiper-next icon="chevron_right_white_24dp.svg" />
                        <x-swiper-prev icon="chevron_left_white_24dp.svg" />
                        <x-swiper-pagination/>
                    </div>
        
                    <div class="rectangle-banner rectangle-banner--bigger w-100 rounded mb-5" 
                    style="background-image: url(
                        {{ asset('subclass/' . $subclass->gambar_aktifitas_belajar
                    ) }})"></div>
        
                    {{-- data sementara --}}
                    <div class="swiper-container slider-one-content-rounded-pagination text-center mb-5">
                        <div class="swiper-wrapper">
                            @for($i = 0; $i < 3; $i++)
                            <div class="swiper-slide">
                                <img src="{{ asset('subclass/1.jpg') }}" alt=""
                                width="100%" height="600px" />
                            </div>
                            @endfor
                        </div>
                        
                        <x-swiper-next icon="chevron_right_white_24dp.svg" />
                        <x-swiper-prev icon="chevron_left_white_24dp.svg" />
                        <x-swiper-pagination/>
                    </div>
        
                    <div class="bg-purple-to-orange py-4 row mx-0 justify-content-center">
                        <div>
                            <p class="h4 text-white text-center">Akan ditutup dalam</p>
                            <p class="text-center text-white">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                                Molestias,assumenda.
                            </p>

                            {{-- data sementara --}}
                            <div class="coutdown py-3 rounded shadow" 
                            data-dateline="Jan 5, 2022 15:37:25">
                                @include('includes.coutdown-el', [
                                    'number' => 23,
                                    'numberClass' => 'coutdown__day',
                                    'unit' => 'Hari'
                                ])
                                @include('includes.coutdown-el', [
                                    'number' => 5, 
                                    'numberClass' => 'coutdown__hour',
                                    'unit' => 'Jam'
                                ])
                                @include('includes.coutdown-el', [
                                    'number' => 16, 
                                    'numberClass' => 'coutdown__minute',
                                    'unit' => 'Menit'
                                ])
                                @include('includes.coutdown-el', [
                                    'number' => 45,
                                    'numberClass' => 'coutdown__second',
                                    'unit' => 'Detik'
                                ])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 mt-5">
                    <a href="" class="btn btn-lg bg-green-dark text-white 
                    py-3 w-100 mb-5 shadow-lg">
                        DAFTAR SEKARANG
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    @include('includes.latest-news')

@endsection
