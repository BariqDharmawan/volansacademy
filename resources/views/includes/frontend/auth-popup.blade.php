<!-- form itself end-->
    <form id="login-form" class="white-popup-block mfp-hide popup-form" method="POST" action="{{ route('login') }}" onsubmit="ceklogin(); return false;">
        <div class="popup_box ">
            <div class="popup_inner">
                <div class="logo text-center">
                    <a href="#">
                        <img style="width:150px" src="{{ url('frontend/img/logo.png')}}" alt="">
                    </a>
                </div>
                
                    <h4 style="text-align:center">Masuk ke akun</h4>
                    <h4 style="text-align:center">Volans Education kamu!</h4>
                
                <form action="#">
					@csrf
					<input type="hidden" name="previous" value="{{ url()->current() }}">
					<div class="row">
                        <div class="col-xl-12 col-md-12">
                            <input type="email" name="email" id="email" placeholder="Enter email" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" id="login-button" class="boxed_btn_orange">MASUK</button>
                        </div>
                    </div>
                </form>
                <p class="doen_have_acc"><a class="dont-hav-acc" href="/password/reset">Lupa password?</a></p>
                <p class="doen_have_acc">Belum mempunyai akun? <a style="text-decoration:revert;" class="dont-hav-acc" href="#register-form">Silahkan daftar</a></p>
            </div>
        </div>
    </form>
    <!-- form itself end -->

    <!-- form itself end-->
    <form id="register-form" class="white-popup-block mfp-hide popup-form" method="POST" onsubmit="ceksignup(); return false;" action="{{ route('register') }}">
        <div class="popup_box ">
            <div class="popup_inner">
                <div class="logo text-center">
                    <a href="#">
                        <img style="width:150px" src="{{ url('frontend/img/logo.png')}}" alt="">
                    </a>
                </div>
                <h4 style="text-align:center">Pendaftaran</h4>
                <form action="#">
					@csrf
					<input type="hidden" name="previous" value="{{ url()->current() }}">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <input type="text" name="name" id="newName" placeholder="Nama Lengkap" required>
                        </div>
						<div class="col-xl-12 col-md-12">
                            <input type="email" name="email" id="newEmail" placeholder="Email" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="text" name="phone" id="newPhone" placeholder="No.Handphone" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" name="password" id="newPassword" placeholder="Password" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="Password" name="password_confirmation" id="newConfirmPassword" placeholder="Konfirmasi password">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <p style="color:white; ">Denga mendaftar maka Anda menyetujui <a style="text-decoration:revert;color:white;" href="#">syarat dan ketentuan</a> yang kami berikan</p>
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" id="submitbtn" class="boxed_btn_orange">DAFTAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <!-- form itself end -->