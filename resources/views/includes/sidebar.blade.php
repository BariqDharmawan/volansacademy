<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Volans Education</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!--div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			
		  @can('class-list')
		  <li class="nav-item">
            <a href="{{ route('classes.index') }}" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Program
              </p>
            </a>
          </li>
		  @endcan
		  @can('coupon-list')
		  <li class="nav-item">
            <a href="{{ route('coupons.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Kupon
              </p>
            </a>
          </li>
		  @endcan
		  @can('blog-list')
		  <li class="nav-item">
            <a href="{{ route('blogs.index') }}" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                Blog
              </p>
            </a>
          </li>
		  @endcan
      @can('banner-list')
		  <li class="nav-item">
            <a href="{{ route('banners.index') }}" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                Banner Utama
              </p>
            </a>
          </li>
		  @endcan
      @can('advantage-list')
		  <li class="nav-item">
            <a href="{{ route('advantages.index') }}" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                Kenapa Volans
              </p>
            </a>
          </li>
		  @endcan
		  @can('newsletter-list')
		  <li class="nav-item">
            <a href="{{ route('newsletters.index') }}" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Newsletter
              </p>
            </a>
          </li>
		  @endcan
		  @can('video-list')
		  <li class="nav-item">
            <a href="{{ route('videos.index') }}" class="nav-link">
              <i class="nav-icon fas fa-play"></i>
              <p>
                Video
              </p>
            </a>
          </li>
		  @endcan
		  @can('tutor-list')
		  <li class="nav-item">
            <a href="{{ route('tutors.index') }}" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Tutor
              </p>
            </a>
          </li>
		  @endcan
		  @can('testimonial-list')
		  <li class="nav-item">
            <a href="{{ route('testimonial.index') }}" class="nav-link">
              <i class="nav-icon fas fa-quote-left"></i>
              <p>
                Testimonial
              </p>
            </a>
          </li>
		  @endcan

      <li class="nav-item has-treeview {{ set_active(['profile','orders.index'], 'menu-open') }}">
				<a href="#" class="nav-link {{ set_active(['profile','orders.index']) }}">
				  <i class="nav-icon fas fa-book-open"></i>
				  <p>
					Profil
					<i class="right fas fa-angle-left"></i>
				  </p>
				</a>
				
				<ul class="nav nav-treeview">
				  <li class="nav-item">
					<a href="{{ route('profile') }}" class="nav-link {{ set_active(['profile']) }}">
					  <i class="far fa-circle nav-icon"></i>
					  <p>
						Data Diri
					  </p>
					</a>
				  </li>
				  <li class="nav-item">
					<a href="{{ route('orders.index') }}" class="nav-link {{ set_active(['orders.index']) }}">
					  <i class="far fa-circle nav-icon"></i>
					  <p>
						Riwayat Transaksi
					  </p>
					</a>
				  </li>
				</ul>
			</li>

      @cannot('class-list')
      <li class="nav-item">
        <a href="{{ route('courses') }}" class="nav-link">
          <i class="nav-icon fas fa-university"></i>
          <p>
            Program
          </p>
        </a>
      </li>
      @endcannot

      @can('configuration-list')
      <li class="nav-item">
        <a href="{{ route('configurations.index') }}" class="nav-link">
          <i class="nav-icon fas fa-university"></i>
          <p>
            Konfigurasi
          </p>
        </a>
      </li>
      @endcan
		  
		  @can('role-list')
		  <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
		  @endcan
		  @can('user-list')
		  <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
