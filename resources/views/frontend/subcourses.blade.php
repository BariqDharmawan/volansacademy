@extends('layouts.frontend')
@section('title', 'Home')

@section('content')
	 <div class="bradcam_area breadcam_bg overlay2">
            <h3>{{ $class->name }}</h3>
        </div>
    <!-- popular_courses_start -->
    <div class="popular_courses <!--plus_padding--> ">
        <div class="all_courses">
            <div class="container">
				<!--div class="text-center">{{ $class->description }}</div-->
				<br>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<div class="row justify-content-md-center">
									@foreach($subclasses as $subclass)
                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                        <div class="single_courses">
                                            <div class="thumb" style="padding-bottom: 100%;position: relative;">
												@if($subclass->external_link != "")
													<a href="{{ $subclass->external_link }}">
												@else
													<a href="{{ route('course', $subclass->id) }}">
												@endif
                                                    <img src="{{ url('subclass/'.$subclass->id.'/'.$subclass->icon) }}" alt="" style="
														position: absolute; 
														top: 0;
														bottom: 0;
														left: 0;
														right: 0; 
														width: 100%; 
														height: 100%; 
														object-fit: cover; 
														object-position: center;">
                                                </a>
                                            </div>
                                            <div class="courses_info">
                                                <!--span>{{ $subclass->periode }}</span-->
												<center>
												@if($subclass->external_link != "")
													<a href="{{ $subclass->external_link }}"><h3 style="margin:0">{{ $subclass->name }}</h3><h6>{{ $subclass->sub_name }}</h6></a>
												@else
													<a href="{{ route('course', $subclass->id) }}"><h3 style="margin:0">{{ $subclass->name }}</h3><h6>{{ $subclass->sub_name }}</h6></a>
												@endif
                                                </center>
												<div class="star_prise row-fluid">
                                                    
														<div class="prise text-center">
															@if($subclass->price_discount > 0)
																
																<span class="offer" style="font-size:small;margin:0;color:darkred !important">{{ number_format($subclass->price) }}</span>
																<span class="active_prise"  style="color:red;font-weight:bold">
																	Rp. {{ number_format($subclass->price_discount) }} 
																</span>
																
															@else
															<span class="active_prise">
																Rp. {{ number_format($subclass->price) }} 
															</span>
															@endif
														</div>
													
                                                </div>
												
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
