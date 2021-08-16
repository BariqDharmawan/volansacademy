@extends('layouts.frontend')
@section('title', 'Home')
@section('content')

      <!-- bradcam_area_start -->
     <div class="bradcam_area breadcam_bg overlay2 " id="blog_title" style="color:white">
         <div class="resetcss">
			{!! $blog->title !!}
		 </div>
		 
     </div>
     <!-- bradcam_area_end -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="{{ url('blog/'.$blog->featured_image) }}" alt="">
                  </div>
                  <div class="blog_details">
					<div class="resetcss">
						<div>
							{!! $blog->body !!}
						</div>
					</div>
					<br>
					<div style="border-top: double; border-color: grey;">
						Download Lampiran : <a target="_blank" href="{{ asset('blogfile/'.$blog->file) }}">disini</a>
					</div>
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                     </div>
                  </div>
                  <div class="navigation-area">
                     <div class="row">
						<div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            @if($prevblog)
						   <div class="thumb">
                              <a href="#">
                                 <img style="width:100%" class="img-fluid" src="{{ url('blog/'.$prevblog->featured_image) }}" alt="">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           </div>
                           <div class="detials">
                              <p>Prev Post</p>
                              <a href="{{ url('article/'.$prevblog->id) }}">
                                 <h4>{{ strip_tags($prevblog->title) }}</h4>
                              </a>
                           </div>
						   @endif
                        </div>
						
						
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           @if($nextblog)
							<div class="detials">
                              <p>Next Post</p>
                              <a href="{{ url('article/'.$nextblog->id) }}">
                                 <h4>{{ strip_tags($nextblog->title) }}</h4>
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="#">
                                 <img style="width:100%" class="img-fluid" src="{{ url('blog/'.$nextblog->featured_image) }}" alt="">
                              </a>
                           </div>
						   @endif
                        </div>
						
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                     <form action="#">
                        <div class="form-group">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder='Search Keyword'
                                 onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                              <div class="input-group-append">
                                 <button class="btn" type="button"><i class="ti-search"></i></button>
                              </div>
                           </div>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                           type="submit">Search</button>
                     </form>
                  </aside>
                  <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title">Recent Post</h3>
                     @foreach($recentblogs as $recent)
					<div class="media post_item">
						<img style="width:50%" src="{{ url('blog/'.$recent->featured_image) }}" alt="post">
						<div class="media-body">
							<a href="{{ url('article/'.$recent->id) }}">
								<h3>{{ strip_tags($recent->title) }}</h3>
							</a>
							<p>{{ date('M d, Y', strtotime($recent->created_at)) }}</p>
						</div>
					</div>
					
					@endforeach
                  </aside>
                  <aside class="single_sidebar_widget newsletter_widget">
                     <h4 class="widget_title">Newsletter</h4>
                     <form action="{{ route('subscribersstore') }}">
                        <div class="form-group">
                           <input type="email"  name="email" class="form-control" onfocus="this.placeholder = ''"
                              onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                           type="submit">Subscribe</button>
                     </form>
                  </aside>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->
@endsection

