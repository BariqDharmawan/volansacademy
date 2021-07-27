<div class="modal fade" id="login-popup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="login-form" method="POST" 
                action="{{ route('login') }}" 
                onsubmit="ceklogin(); return false;">
                    <div class="popup_box ">
                        <div class="popup_inner">
                            <div class="logo text-center">
                                <a href="#">
                                    <img style="width:150px" src="{{ url('frontend/img/logo.png')}}" alt="">
                                </a>
                            </div>
                            
                            <h2 class="text-center">
                                Masuk ke akun <br>
                                <small>Volans Education kamu!</small>
                            </h2>
                            
                            @csrf
                            <input type="hidden" name="previous" 
                            value="{{ url()->current() }}">
                            <div class="row">
                                <div class="col-xl-12 col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" placeholder="Enter email" 
                                        class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="password" 
                                        id="password" placeholder="Password"
                                        class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3
                            justify-content-between">
                                <p class="m-0">
                                    <a href="/password/reset">Lupa password?</a>
                                </p>
                                <button type="submit" class="btn btn-primary m-0">
                                    MASUK
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>