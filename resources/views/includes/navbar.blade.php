  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
		<a class="nav-link" data-toggle="dropdown" href="#">
			<div class="user-panel">
				<div class="image">
				  <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
				  {{ auth()->user()->name }}
				</div>
			</div>
        </a>
		<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="{{ route('profile') }}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Edit Profile
          </a>
		  <div class="dropdown-divider"></div>
		  <form class="form-inline ml-3" method="POST" action="{{ route('logout') }}">
			  <div class="input-group input-group-sm">
				 @csrf
                    <div class="dropdown-item">
                        <button class="btn btn-danger btn-icon-split btn-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            <span class="text">{{ __('Logout') }}</span>
                        </button>
                    </div>
			  </div>
			</form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->