    <header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area" style="background:linear-gradient(to right, #a64eee 0%, #3c35ce 100%)">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters"> 
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="/">
                                    <img src="{{ url('frontend/img/logo.png')}}"  style="width:85px;" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="{{ (request()->segment(1) == '') ? 'active' : '' }}"  href="/">Home</a></li>
                                        <li><a class="{{ (request()->segment(1) == 'courses' || request()->segment(1) == 'subcourses' || request()->segment(1) == 'course') ? 'active' : '' }}" href="/courses">Program</a></li>
										<li><a class="main_menu" href="/#alumni">Alumni</a></li>
										<li><a class="main_menu" href="/#testimoni">Testimoni</a></li>
										<li><a class="main_menu" href="/#tutor">Tutor</a></li>
										<li><a class="main_menu" href="/#kontak">Kontak</a></li>
                                        <li><a class="main_menu mobile-menu d-none">&nbsp;</a></li>
										@auth
                                        
                                        <li><a class="main_menu mobile-menu d-none" href="{{ route('cart') }}" class="login">Keranjang</a></li>
										<li><a class="main_menu mobile-menu d-none" href="{{route('dashboard')}}"><?php echo auth()->user()->name?></a></li>
										@else
										<li><a class="main_menu mobile-menu d-none login popup-with-form" href="#login-form">Masuk/Daftar</a></li>	
										@endauth
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
								@auth
								<a href="{{ route('cart') }}" class="login">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a href="{{route('dashboard')}}" class="login">
                                    <i class="flaticon-user"></i>
                                    <span><?php echo auth()->user()->name?></span>
                                </a>
								@else
								<a href="#login-form" class="login popup-with-form">
                                    <i class="flaticon-user"></i>
                                    <span>Masuk/Daftar</span>
                                </a>	
								@endauth
                                
                                <div class="live_chat_btn">
                                    <a class="boxed_btn_orange" href="https://wa.me/6289699505992">
                                        <i class="fa fa-phone"></i>
                                        <span>+6289699505992</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
