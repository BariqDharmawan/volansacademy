@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
        <div class="bradcam_area breadcam_bg overlay2">
                <h3>blog</h3>
            </div>
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
						@foreach($blogs as $blog)
						<article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ url('blog/'.$blog->featured_image) }}" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3>{{ date('d', strtotime($blog->created_at)) }}</h3>
                                    <p>{{ date('M', strtotime($blog->created_at)) }}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ url('article/'.$blog->id) }}">
                                    <h2>{{ strip_tags($blog->title) }}</h2>
                                </a>
                                <p>{{ $blog->short_description }}</p>
                                <!--ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul-->
                            </div>
                        </article>
						@endforeach
                        
						<nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
								<li class="page-item">
                                    <a href="?halaman=1" class="page-link" aria-label="Pertama">
                                        First
                                    </a>
                                </li>
								<?php 
								
								if(isset($_GET['halaman'])){
									$page_start = $_GET['halaman'] - 2;
									if($page_start <= 0)
										$page_start = 1;
									$page_end = $_GET['halaman'] + 2;
									if($page_end > $pages)
										$page_end = $pages;
								}else{
									$page_start = 1;
									$page_end = $page_start + 2;
									if($page_end > $pages)
										$page_end = $pages;
								}
								
								for ($i=$page_start; $i<=$page_end ; $i++){ 
									if(isset($_GET['halaman'])){
										if($i == $_GET['halaman']){
											$status = "active";
											$href="#";
										}else{
											$status = "";
											$href="?halaman=".$i;
										}
									}elseif(!isset($_GET['halaman']) && $i == 1){
										$status = "active";
										$href="#";
									}else{
										$status = "";
										$href="?halaman=".$i;
									}
									?>
								
									
									<li class="page-item <?php echo $status ?>">
										<a href="<?php echo $href ?>" class="page-link"><?php echo $i; ?></a>
									</li>
								 <?php 
								}
								?>
								<li class="page-item">
                                    <a href="?halaman=<?php echo $pages?>" class="page-link" aria-label="Terakhir">
                                        Last
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
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
    <!--================Blog Area =================-->
@endsection