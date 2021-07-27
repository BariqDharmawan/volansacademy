@extends('layouts.frontend')
@section('title', 'Home')

@section('content')
	<div class="swiper-container slider-one-content-rounded-pagination text-center">
        <div class="swiper-wrapper">
            @foreach($banners as $banner)
            <div class="swiper-slide">
                <img src="{{ asset('banner/'.$banner->image) }}" alt="" width="100%" height="600px" />
            </div>
            @endforeach
        </div>
        
        <x-swiper-next icon="chevron_right_white_24dp.svg" />
        <x-swiper-prev icon="chevron_left_white_24dp.svg" />
        <div class="swiper-pagination"></div>
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
        class="pattern-bottom-left pattern-pb-5 left-0" draggable="false">
        <div class="container text-center">
            <h2 class="font-weight-bold mb-5 text-center">
                Program Belajar {{ config('app.name') }}
            </h2>
            
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
                            <div class="card h-full border-0 shadow">
                                <img src="{{ asset('class/'.$class->banner) }}" 
                                class="card-img-top" alt="">
                                <div class="card-body text-left">
                                    <h5 class="card-title mb-4">
                                        {{ Str::words($class->name, 3) }}
                                    </h5>
                                    <ul>
                                        <x-list-icon icon="calendar_today_black_24dp.svg" 
                                        text="{{ $class->created_at->format('D, d M Y') }}" />
                                        <x-list-icon icon="schedule_black_24dp.svg" 
                                        text="{{ $class->created_at->format('H.i') }}" />
                                        <x-list-icon icon="language_black_24dp.svg" 
                                        text="Public" />
                                        <x-list-icon icon="attach_money_black_24dp.svg" 
                                        text="Rp. 3.500.000,-" />
                                    </ul>
                                </div>
                                <div class="card-footer p-0 bg-transparent rounded-bottom overflow-hidden">
                                    <a href="{{ route('subcourses', $class->id) }}" 
                                        class="btn btn-warning w-100 rounded-0">
                                        Click here for registration
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

            
            {{-- <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> --}}
                    {{-- <div class="row">
                        @foreach($classes as $class)
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="thumb">
                                <a href="{{ route('subcourses', $class->id) }}">
                                    <img src="{{ asset('class/'.$class->banner) }}" alt=""
                                    height="90px">
                                </a>
                            </div>
                            <div class="courses_info">
                                @if($class->external_link != "")
                                    <p>
                                        <a href="{{ $class->external_link }}">
                                            {{ $class->name }}
                                        </a>
                                    </p>
                                @else
                                    <h3>
                                        <a href="{{ route('subcourses', $class->id) }}">
                                            {{ $class->name }}
                                        </a>
                                    </h3>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div> --}}
                {{-- </div>
            </div> --}}
            <a href="" class="btn btn-success bg-green-dark mt-4">Lihat semua</a>
        </div>
    </section>
    
    <section id="cerita-alumni" class="py-5">
        <h2 class="font-weight-bold mb-5 text-center">
            Cerita Alumni Volans Education
        </h2>
        <div class="container">
            <div class="row">
                @foreach ($videos as $story)
                <div class="col-lg-3">
                    <div class="card bg-transparent h-full border-0 shadow-none">
                        <div class="position-relative play-popup rounded overflow-hidden">
                            <img src="{{ asset('blog/1.jpg') }}" class="card-img-top" 
                            alt="{{ $story->name }}"/>
                            <div class="play-popup__overlay"></div>
                            <a href="javascript:void(0);" class="play-popup__btn"
                            data-toggle="modal" 
                            data-target="#play-popup-{{ Str::slug(
                                strtolower($story->name)
                            ) }}" 
                            data-youtube-video="">
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

    <div class="testimonial_area d-block d-sm-none d-md-none d-lg-none" id="testimoni2" style="background-image:url(config/{{ str_replace(' ', '%20', $config['testimonial banner hape']) }})">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="section_title text-center mb-100">
						<h3 style="color:white; font-weight:bold">Jadilah Pemenang Bersama Volans</h3>
					</div>
				</div>
			</div>
		</div>
        <div class="testmonial_active owl-carousel">
			@foreach($testimonials as $testi)
			<div class="single_testmoial">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="testmonial_text text-center">
                                <div class="author_img">
                                    <img src="{{ url('images/'.$testi->image.'?id='.$testi->updated_at)}}" alt="" style="width:200px;height:200px;border-radius: 50%;">
                                </div>
								<br>
								<span style="font-family:'Poppins', sans-serif;color:{{$testi->warna}};font-size:{{$testi->ukuran_mobile}};text-align:{{$testi->alignment}}"><strong>{{ $testi->name }}</strong></span>
								<br>
								<span style="font-family:'Poppins', sans-serif;color:{{$testi->warna}};font-size:{{$testi->ukuran_mobile}};text-align:{{$testi->alignment}}"><strong>{{ $testi->from }}</strong></span>
                                <p style="font-family:'Poppins', sans-serif;color:{{$testi->warna}};font-size:{{$testi->ukuran_mobile}};text-align:{{$testi->alignment}}">
								{!! nl2br($testi->testimonial) !!}
                                </p>
                                <!--span>- Jquileen</span-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			@endforeach
            
            
        </div>
    </div>
    <!-- testimonial_area_end -->


	<!-- tutor -->
	
	{{-- <div class="our_courses" id="tutor" style="padding-bottom:0px">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="section_title text-center mb-100">
						<h3  style=" font-weight:bold">Belajar Seru Bareng<br>Master Tutor Volans Education</h3>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Swiper -->
		  <div class="swiper-container swiper-container1 text-center" style="width:80%">
			<div class="swiper-wrapper"  >
				@foreach($tutors as $tutor)
				<div class="swiper-slide">
					<div class="author_img">
						<img src="{{ url('images/'.$tutor->image.'?id='.$tutor->updated_at)}}" alt="" style="width:200px;height:200px;border-radius: 50%;">
					</div>
					<br>
					<span style="font-family:'Poppins', sans-serif"><strong>{{ $tutor->name }}</strong></span>
					<br>
					<span style="font-family:'Poppins', sans-serif"><strong>{{ $tutor->field }}</strong></span>
					<p style="margin-bottom:100px;font-family:'Poppins', sans-serif">
					{{ $tutor->from }}
					</p>
				</div>
				@endforeach
			</div>
			<!-- Add Pagination -->
			<div class="swiper-pagination swiper-pagination1"></div>
			<!-- Add Arrows -->
			<div class="swiper-button-next swiper-button-next1"></div>
			<div class="swiper-button-prev swiper-button-prev1"></div>
		  </div>
    </div> --}}
	
	<!-- tutr end -->

    <!-- our_courses_start -->
    <div class="our_courses" style="padding-bottom:0px">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center">
                        <h3 style="font-weight:bold;">Kenapa Harus Memilih<br>Volans Education?</h3>
                        <!--p>Your domain control panel is designed for ease-of-use and <br>
                            allows for all aspects of your domains.
                        </p-->
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($advantages as $advantage)
                <div class="col-xl-4 col-md-6 col-lg-6">
                    <div class="text-center" style="padding:15px">
                        <img style="width:100%" src="{{ url('advantage/'.$advantage->image)}}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- our_courses_end -->

    <!-- subscribe_newsletter_Start -->
    
    <div class="subscribe_newsletter d-none d-sm-block d-md-block d-lg-block" style="background-image:url(config/{{ str_replace(' ', '%20', $config['subscribe banner']) }})">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="newsletter_text">
                        <h3>Subscribe Volans</h3>
                        <p style="font-family:'Poppins', sans-serif">Daftarkan emailmu untuk mendapatkan soal dan pembahasan materi UTBK-SBMPTN secara gratis dari Volans Education</p>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="newsletter_form">
                        <h4>Masukkan email kamu di bawah ini :</h4>
                        <form action="{{ route('subscribersstore') }}" class="newsletter_form">
                            <input type="text" required name="email" placeholder="Enter your mail">
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="subscribe_newsletter d-block d-sm-none d-md-none d-lg-none" style="background-image:url(config/{{ str_replace(' ', '%20', $config['subscribe banner hape']) }})">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="newsletter_text">
                        <h3>Subscribe Volans</h3>
                        <p style="font-family:'Poppins', sans-serif">Daftarkan emailmu untuk mendapatkan soal dan pembahasan materi UTBK-SBMPTN secara gratis dari Volans Education</p>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="newsletter_form">
                        <h4>Masukkan email kamu di bawah ini :</h4>
                        <form action="{{ route('subscribersstore') }}" class="newsletter_form">
                            <input type="text" required name="email" placeholder="Enter your mail">
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="latest-blog" class="py-5">
        <div class="container">
            <div class="section_title text-center mb-100">
                <h2 class="font-weight-bold mb-5 text-black text-center">
                    Kabar Terbaru Seleksi Kampus
                </h2>
            </div>
            <div class="position-relative">
                <div class="swiper-container slider-number-pagination-three-slide positin-static swiper-pagination--bottom-container">
                    <div class="swiper-wrapper">
                        @foreach($blogs as $blog)
                        <div class="swiper-slide px-3">
                            <div class="card h-full border-0 shadow">
                                <img src="{{ asset('blog/'.$blog->featured_image) }}" class="card-img-top" alt="{{ $blog->title }}">
                                <div class="card-body position-relative pt-5">
                                    <time class="card-widget-date text-center">
                                        {{ $blog->created_at->format('d') }} <br>
                                        {{ $blog->created_at->format('M') }}
                                    </time>
                                    <h5 class="card-title font-weight-bold">
                                        <a href="{{ url('article/'.$blog->id) }}"
                                        class="text-black">
                                            {{ Str::words($blog->title, 3) }}
                                        </a>
                                    </h5>
                                    <p class="card-text">
                                        {{ Str::words($blog->short_description, 10) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination bottom-0"></div>
                </div>
            </div>
		</div>
    </section>

@endsection

@section('component')
    @foreach ($videos as $story)
    <div class="modal fade" id="play-popup-{{ Str::slug(strtolower($story->name)) }}" 
    tabindex="-1" aria-hidden="true"
    data-backdrop="static" data-keyboard="false" tabindex="-1">
        <button type="button" class="close close--top-right-popup" data-dismiss="modal" aria-label="Close">
            <img src="{{ asset('images/icon/close_white_24dp.svg') }}" alt="" srcset="">
        </button>
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content p-0">
                <div class="modal-body p-0 d-flex">
                    <iframe width="100%" src="https://www.youtube.com/embed/TranVlEwQqw?autoplay=1&origin={{ config('app.url') }}" 
                    frameBorder="0" height="500" class="modal-body__embed"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
    
	
@push('scripts')
<script>
    window.document.onkeydown = function(e) {
    if (!e) {
        e = event;
    }
    if (e.keyCode == 27) {
        lightbox_close();
    }
    }

    function lightbox_open(id='') {
    var lightBoxVideo = document.getElementById("VisaChipCardVideo"+id);
    document.getElementById('light'+id).style.display = 'block';
    document.getElementById('fade'+id).style.display = 'block';
    lightBoxVideo.play();
    }

    function lightbox_open_external(id='', url='') {
        var video_wrapper = $('.youtube-video-place');
        video_wrapper.html('<iframe allowfullscreen frameborder="0" class="embed-responsive-item" src="' + url + '"></iframe>');
    
        document.getElementById('lightexternal').style.display = 'block';
        document.getElementById('fadeexternal').style.display = 'block';
    }

    function lightbox_close(id='') {
    var lightBoxVideo = document.getElementById("VisaChipCardVideo"+id);
    document.getElementById('light'+id).style.display = 'none';
    document.getElementById('fade'+id).style.display = 'none';
    lightBoxVideo.pause();
    }

    function lightbox_close_external(id='') {  
        $('.embed-responsive-item').each(function(){
        this.contentWindow.postMessage('{"event":"command","func":"stopVideo","args":""}', '*')
        });
        document.getElementById('lightexternal').style.display = 'none';
        document.getElementById('fadeexternal').style.display = 'none';
    }

</script>

<script>
	$('.nav__link').click(function(){
        $('.slicknav_btn ').click();
	});
  </script>
@endpush