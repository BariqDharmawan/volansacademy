    <!-- JS here -->
    <script src="{{ url('frontend/edumark/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/popper.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/ajax-form.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/waypoints.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/scrollIt.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/wow.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/nice-select.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/plugins.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/gijgo.min.js') }}"></script>

    <!--contact js-->
    <script src="{{ url('frontend/edumark/js/contact.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/jquery.form.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('frontend/edumark/js/mail-script.js') }}"></script>

    <script src="{{ url('frontend/edumark/js/main.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>

    <script src="{{ url('js/sweetalert.min.js') }}"></script>

    <!-- login -->
    <script>
        function ceklogin(){
            $.ajax({
                url: "{{ route('ajaxlogin') }}",
                dataType: "JSON",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'email': $("#email").val(),
                    'password': $("#password").val(),
                },
                method: "POST",
                success: function(response){
                    //jika error
                    if(response.success != true){
                        swal("Gagal!", response.message, "error");
                    }else{
                        swal("Sukses!", response.message, "success");
                        //redirect to app
                        window.location.reload();
                    }
                },
                error:function(response){
                    swal("Error!", response.message, "error");
                }
            });
        }
        function ceksignup(){
            if($("#newConfirmPassword").val() != $("#newPassword").val()){
                swal("Error!", "Password tidak cocok", "error");
                return false;
            }
            $.ajax({
                url: "{{ route('ceksignup') }}",
                dataType: "JSON",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'email': $("#newEmail").val(),
                    'name': $("#newName").val(),
                    'confirm': $("#newConfirmPassword").val(),
                    'password': $("#newPassword").val(),
                    'phone': $("#newPhone").val(),
                },
                method: "POST",
                success: function(response){
                    //jika error
                    if(response.success != true){
                        swal("Gagal!", response.message, "error");
                    }else{
                        swal("Sukses!", response.message, "success");
                        //redirect to app
                        window.location.href = '{{ route("profile") }}';
                    }
                },
                error:function(response){
                    swal("Error!", response.message, "error");
                }
            });
        }
    </script>