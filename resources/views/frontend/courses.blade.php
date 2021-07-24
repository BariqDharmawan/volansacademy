@extends('layouts.frontend')
@section('title', 'Program Belajar')

@push('styles')
<link rel="stylesheet" href="{{ url('frontend/edumark/css/swiper-bundle.min.css') }}">
@endpush

@section('content')

    <!-- header-end -->
        <!-- bradcam_area_start -->
        <div class="bradcam_area" style="align-items: center;display: flex;flex-direction: column;">
            <h3 style="color:black;">Program Belajar</h3>
            <div style="
                width: 64px;
                height: 2px;
                background-color: rgb(237, 38, 67);
                border-radius: 8px;
            ">&nbsp;</div>
        </div>
        <!-- bradcam_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses <!--plus_padding--> ">
        <!--div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Popular Courses</h3>
                        <p>Your domain control panel is designed for ease-of-use and <br> allows for all aspects of your
                            domains.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="course_nav">
                        <nav>
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">All Courses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Photoshop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false">UI/UX</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="design-tab" data-toggle="tab" href="#design" role="tab"
                                        aria-controls="design" aria-selected="false">Web Design</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Web-tab" data-toggle="tab" href="#Web" role="tab"
                                        aria-controls="design" aria-selected="false">Web dev</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Web-tab1" data-toggle="tab" href="#Web1" role="tab"
                                        aria-controls="design" aria-selected="false">Wordpress</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Web-tab11" data-toggle="tab" href="#Web11" role="tab"
                                        aria-controls="design" aria-selected="false">Adobe XD</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Adobe-XD-tab8" data-toggle="tab" href="#Adobe-XD8" role="tab"
                                        aria-controls="design" aria-selected="false">Sketch App</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Adobe-XD-tab9" data-toggle="tab" href="#Adobe-XD9" role="tab"
                                        aria-controls="design" aria-selected="false">Illustrator</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div-->
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
                                                    <img src="{{ url('class/'.$class->banner) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="courses_info">
                                                <!--span>Photoshop</span-->
                                                @if($class->external_link != "")
													<h3 style="text-align:center"><a href="{{ $class->external_link }}">{{ $class->name }}</a></h3>
												@else
													<h3 style="text-align:center"><a href="{{ route('subcourses', $class->id) }}">{{ $class->name }}</a></h3>
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
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_courses_end-->

@endsection

@section('component')
    
    <!-- subscribe_newsletter_Start -->
    <div class="subscribe_newsletter">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="newsletter_text">
                        <h3>Subscribe Volans</h3>
                        <p>Daftarkan emailmu untuk mendapatkan soal dan pembahasan materi UTBK-SBMPTN secara gratis dari Volans Education</p>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="newsletter_form">
                        <h4>Masukkan email kamu di bawah ini :</h4>
                        <form action="{{ route('subscribersstore') }}" class="newsletter_form">
                            <input type="text" name="email" required placeholder="Enter your mail">
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
                        <h3>Kabar Terbaru Seleksi Kampus</h3>
                    </div>
                </div>
            </div>
		</div>
            <div class="swiper-container swiper-container3 text-center" style="width:80%">
			<div class="swiper-wrapper"  >
				@foreach($blogs as $blog)
				<div class="swiper-slide">
					<div class="thumb" style="width:100%;height:200px;background: url({{url('blog/'.$blog->featured_image)}}); background-size:cover">
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
			<div class="swiper-button-next swiper-button-next3"></div>
			<div class="swiper-button-prev swiper-button-prev3"></div>
		  </div>
    </div>
    <!-- our_latest_blog_end -->

@endsection
@push('scripts')
<script src="{{ url('frontend/edumark/css/swiper-bundle.min.js') }}"></script>
<script>
var jml = 3;
	if(screen.width <= 576)
		jml = 1;
	
	
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
</script>
@endpush