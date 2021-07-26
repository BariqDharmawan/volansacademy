@extends('layouts.frontend')
@section('title', 'Home')

@section('content')
    <!-- slider_area_start -->
	<div class="swiper-container slider-one-content-rounded-pagination text-center">
        <div class="swiper-wrapper">
            @foreach($banners as $banner)
            <div class="swiper-slide">
                <img src="{{ asset('banner/'.$banner->image) }}" alt="" width="100%" height="600px" />
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next">
            <img src="{{ asset('images/icon/chevron_right_white_24dp.svg') }}" alt="" height="40px">
        </div>
        <div class="swiper-button-prev">
            <img src="{{ asset('images/icon/chevron_left_white_24dp.svg') }}" alt="" height="40px">
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- slider_area_end -->

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

    <!-- popular_courses_start -->
    <div class="bg-green-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-1">
                        <h2 class="font-weight-bold">Program Belajar</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
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
                    </div>
                </div>
            </div>
            <a href="" class="btn btn-success bg-green-dark">Lihat semua</a>
        </div>
    </div>
    <!-- popular_courses_end-->

	<div id="fadeexternal" class="fadevideo" onClick="lightbox_close_external();"></div>
	<div id="lightexternal" class="lightvideoexternal">
	<div href="#" class="boxclose" id="boxclose" onclick="lightbox_close_external();"></div>
		<div class="youtube-video-place embed-responsive embed-responsive-4by3 "></div>
	</div>
	@foreach($videos as $video)
			@if($video->external_url == "")
			<div id="fade{{ $video->id }}" class="fadevideo" onClick="lightbox_close({{ $video->id }});"></div>
			<div id="light{{ $video->id }}" class="lightvideo">
			
				<div href="#" class="boxclose" id="boxclose{{ $video->id }}" onclick="lightbox_close({{ $video->id }});"></div>
				<video id="VisaChipCardVideo{{ $video->id }}" style="width: 100%;height: auto;border:0" controls>
				  <source src="{{ url('video/'.$video->video) }}" type="video/mp4">
				</video>
			</div>
			@endif
	@endforeach
	<!-- video start -->
    <div class="our_courses" style="padding-top:0px" id="alumni">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3 style=" font-weight:bold">Cerita Alumni Volans Education</h3>
                        <!--p>Your domain control panel is designed for ease-of-use and <br>
                            allows for all aspects of your domains.
                        </p-->
                    </div>
                </div>
            </div>
			
			
			
			<div class="row">
				@foreach($videos as $video)
				<div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="single_course text-center" style="padding:0px;border:none">
						@if($video->external_url == "")
						<div onclick="lightbox_open({{ $video->id }});" class="lightbox_open" style="background: url({{asset('videoimage/'.$video->image.'?id='.str_replace(" ", "", $video->updated_at))}}); background-size:cover">
						@else
						<div onclick="lightbox_open_external({{ $video->id }}, '{{ $video->external_url }}?enablejsapi=1');" class="lightbox_open" style="background: url({{asset('videoimage/'.$video->image.'?id='.str_replace(" ", "", $video->updated_at))}}); background-size:cover">
						@endif
							<div class="overlayvideo">
							  <div class="iconvideo" title="Play cerita">
								<i class="fa fa-play"></i>
							  </div>
							</div>
						</div>
						<!-- judul video -->
						<div class="text-center">{{ $video->name }}</div>
					</div>
                </div>
				@endforeach
            </div>
        </div>
    </div>
    <!-- video end -->

    <!-- testimonial_area_start -->
    <div class="testimonial_area d-none d-sm-block d-md-block d-lg-block" id="testimoni" style="background-image:url(config/{{ str_replace(' ', '%20', $config['testimonial banner']) }})">
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
								<span style="font-family:'Poppins', sans-serif; color:{{$testi->warna}};font-size:{{$testi->ukuran}};text-align:{{$testi->alignment}}"><strong>{{ $testi->name }}</strong></span>
								<br>
								<span style="font-family:'Poppins', sans-serif;color:{{$testi->warna}};font-size:{{$testi->ukuran}};text-align:{{$testi->alignment}}"><strong>{{ $testi->from }}</strong></span>
                                <p style="font-family:'Poppins', sans-serif;color:{{$testi->warna}};font-size:{{$testi->ukuran}};text-align:{{$testi->alignment}}" >
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
    <!-- testimonial_area_start -->
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
    <!-- subscribe_newsletter_end -->

    <section id="latest-blog">
        <div class="container">
            <div class="section_title text-center mb-100">
                <h3 class="font-weight-bold text-black">Kabar Terbaru Seleksi Kampus</h3>
            </div>
            <div class="swiper-container slider-number-pagination-three-slide">
				<div class="swiper-wrapper">
					@foreach($blogs as $blog)
					<div class="swiper-slide">
						<div class="thumb" style="width:100%;height:200px;background: url({{url('blog/'.$blog->featured_image.'?id='.str_replace(" ", "", $blog->updated_at))}}); background-size:cover">
							<!--img style="width:100%; height:200px;" src="{{ url('blog/'.$blog->featured_image)}}" alt=""-->
						</div>
						<div class="content_blog">
							<div class="date">
								<p>{{ date('d/m/Y', strtotime($blog->created_at)) }}</p>
							</div>
							<div class="blog_meta">
								<h3><a href="{{ url('article/'.$blog->id) }}">{{ strip_tags($blog->title) }}</a></h3>
							</div>
							<p class="blog_text" style="margin-bottom:50px">
								{{ $blog->short_description }}
							</p>
						</div>
					</div>
					@endforeach
				</div>
				<div class="swiper-pagination swiper-pagination3"></div>
			</div>
		</div>
    </section>

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


/*$('.owl-carousel').owlCarousel({
    loop:true,
	items:1,
    margin:10,
    nav:false,
	autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
	navText: ['&lt;','&gt;']
})*/

</script>

<script>
	$('.nav__link').click(function(){
        $('.slicknav_btn ').click();
	});
  </script>
@endpush