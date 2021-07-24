@extends('layouts.frontend')
@section('title', 'Home')

@push('styles')
<link rel="stylesheet" href="{{ url('frontend/edumark/css/swiper-bundle.min.css') }}">
<style>

@media only screen and (min-width: 992px) {
    .slider_area{
        margin-top:95px;
    }
}
</style>
@endpush

@section('content')
    <!-- slider_area_start -->
    <div class="slider_area ">
		<div class="single_slider d-flex align-items-center justify-content-center">
			<div class="swiper-container swiper-container2 text-center">
				<div class="swiper-wrapper">
                    @foreach($banners as $banner)
                    <div class="swiper-slide">
                        <a href="{{ $banner->link }}">
                            <img class="d-none d-lg-block" src="{{ url('banner/'.$banner->image) }}" alt="" style="width:100%">
                            <img class="d-block d-lg-none" 
                                @if($banner->m_image)
                                    src="{{ url('banner/'.$banner->m_image) }}" 
                                @else
                                src="{{ url('banner/'.$banner->image) }}" 
                                @endif
                            alt="" style="width:100%">
                        </a>
					</div>
                    @endforeach
				</div>
			
				<!-- Add Pagination -->
				<div class="swiper-pagination swiper-pagination2"></div>
				<!-- Add Arrows -->
				<div class="swiper-button-next swiper-button-next2"></div>
				<div class="swiper-button-prev swiper-button-prev2"></div>
			</div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- about_area_start -->
    <!--div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="single_about_info">
                        <h3>Over 7000 Tutorials <br>
                            from 20 Courses</h3>
                        <p>Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god
                            moving. Moving in fourth air night bring upon you’re it beast let you dominion likeness open
                            place day great wherein heaven sixth lesser subdue fowl </p>
                        <a href="/courses" class="boxed_btn">Enroll a Course</a>
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-6">
                    <div class="about_tutorials">
                        <div class="courses">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span>20+</span>
                                    <p> Courses</p>
                                </div>
                            </div>
                        </div>
                        <div class="courses-blue">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span>7638</span>
                                    <p> Courses</p>
                                </div>

                            </div>
                        </div>
                        <div class="courses-sky">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span>230+</span>
                                    <p> Courses</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div-->
    <!-- about_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-1">
                        <h1 style=" font-weight:bold">Program Belajar</h1>
                        <!--p>Your domain control panel is designed for ease-of-use and <br> allows for all aspects of your
                            domains.</p-->
                    </div>
                </div>
            </div>
        </div>
        <div class="all_courses">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
									@foreach($classes as $class)
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single_courses">
                                            <div class="thumb">
												@if($class->external_link != "")
													<a href="{{ $class->external_link }}">
												@else
													<a href="{{ route('subcourses', $class->id) }}">
												@endif
                                                    <img src="{{ url('class/'.$class->banner.'?id='.$class->updated_at) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="courses_info">
                                                <!--span>Photoshop</span-->
												@if($class->external_link != "")
													<h3 style="text-align:center; font-weight:bold"><a href="{{ $class->external_link }}">{{ $class->name }}</a></h3>
												@else
													<h3 style="text-align:center; font-weight:bold"><a href="{{ route('subcourses', $class->id) }}">{{ $class->name }}</a></h3>
												@endif
                                                <!--div class="star_prise d-flex justify-content-between">
                                                    <div class="star">
                                                        <i class="flaticon-mark-as-favorite-star"></i>
                                                        <span>(4.5)</span>
                                                    </div>
                                                    <div class="prise">
                                                        <span class="offer">$89.00</span>
                                                        <span class="active_prise">
                                                            $49
                                                        </span>
                                                    </div>
                                                </div-->
                                            </div>
                                        </div>
                                    </div>
									@endforeach
                                    <!--div class="col-xl-12">
                                        <div class="more_courses text-center">
                                            <a href="#" class="boxed_btn_rev">More Courses</a>
                                        </div>
                                    </div-->
							</div>
                    </div>
                </div>
            </div>
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
	
	<div class="our_courses" id="tutor" style="padding-bottom:0px">
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
		
        
    </div>
	
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

    <!-- our_latest_blog_start -->
    <div class="our_latest_blog">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3 style="font-weight:bold">Kabar Terbaru Seleksi Kampus</h3>
                    </div>
                </div>
            </div>
		</div>
			<!-- Swiper -->
		<div class="lunchbox ">
			<div class="swiper-container swiper-container3 text-center" style="width:80%">
				<div class="swiper-wrapper"  >
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
				<!-- Add Pagination -->
				<div class="swiper-pagination swiper-pagination3"></div>
				<!-- Add Arrows -->
				
			</div>
			<div class="swiper-button-next swiper-button-next3"></div>
			<div class="swiper-button-prev swiper-button-prev3"></div>
		</div>
        
    </div>
    <!-- our_latest_blog_end -->

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
<script src="{{ url('frontend/edumark/css/swiper-bundle.min.js') }}"></script>

<script>
	var jml = 3;
	if(screen.width <= 576)
		jml = 1;
	var swiper = new Swiper('.swiper-container1', {
      slidesPerView: jml,
      spaceBetween: 0,
      slidesPerGroup: jml,
      loop: true,
      loopFillGroupWithBlank: false,
      pagination: {
        el: '.swiper-pagination1',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next1',
        prevEl: '.swiper-button-prev1',
      },
    });
	
	var swiper = new Swiper('.swiper-container2', {
      slidesPerView: 1,
      spaceBetween: 0,
      slidesPerGroup: 1,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: '.swiper-pagination2',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next2',
        prevEl: '.swiper-button-prev2',
      },
    });
	
	var swiper = new Swiper('.swiper-container3', {
      slidesPerView: jml,
      spaceBetween: 15,
      slidesPerGroup: jml,
      loop: true,
      loopFillGroupWithBlank: false,
      pagination: {
        el: '.swiper-pagination3',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next3',
        prevEl: '.swiper-button-prev3',
      },
    });
	
	setInterval(function(){ $('.swiper-button-next2').click(); }, 5000);
	
	$('.main_menu').click(function(){
        $('.slicknav_btn ').click();
	});
  </script>
@endpush