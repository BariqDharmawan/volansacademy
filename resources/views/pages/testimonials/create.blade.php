@extends('layouts.admin')
@section('title', 'Tambah Testimonial')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Tambah testimonial baru</h1>
    </div>

    {!! Form::open(array('route' => 'testimonial.store','method'=>'POST')) !!}
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('testimonial.index') }}" class="btn btn-secondary btn-icon-split">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
            <button type="submit" class="btn btn-success btn-icon-split">
                <span class="icon">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Kirim</span>
            </button>
        </div>
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada masalah dengan data yang anda masukkan.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>testimonial:</strong>
                        <?php echo Form::textArea('testimonial', null, array('placeholder' => 'testimonial','class' => 'form-control mb-2')) ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Nama','class' => 'form-control mb-2')) !!}
                    </div>
                </div>
				          <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Dari:</strong>
                        {!! Form::text('from', null, array('placeholder' => 'Dari sekolah','class' => 'form-control mb-2')) !!}
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Warna:</strong>
                        {!! Form::text('warna', null, array('placeholder' => 'Warna font , format HEX misal #171717','class' => 'form-control mb-2')) !!}
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Ukuran:</strong>
                        {!! Form::text('ukuran', null, array('placeholder' => 'Ukuran font , format px misal 20px','class' => 'form-control mb-2')) !!}
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Ukuran di Hape:</strong>
                        {!! Form::text('ukuran_mobile', null, array('placeholder' => 'Ukuran font di mobile (hape), format px misal 20px','class' => 'form-control mb-2')) !!}
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Alignment:</strong>
                        {!! Form::text('alignment', null, array('placeholder' => 'Alignemnt paragraf , value yg valid antara lain, left, right, center, dan justify','class' => 'form-control mb-2')) !!}
                    </div>
                  </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar:</strong>
                        <input type="file" name="image" id="upload_image" />
						<br>
						<div id="uploaded_image"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div id="uploadimageModal" class="modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Upload & Crop Image</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-8 text-center">
							  <div id="image_demo" style="width:350px; margin-top:30px"></div>
						</div>
						<div class="col-md-4" style="padding-top:30px;">
							<br />
							<br />
							<br/>
							  <div class="btn btn-success crop_image">Crop & Upload Image</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
    {!! Form::close() !!}
</div>
@endsection

@push('scripts')
<script>  
$(document).ready(function(){

	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'circle' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
		$('#uploaded_image').html(null);
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:" {{ route('uploadimage') }}",
        type: "POST",
        data:{"image": response, "jenis": "testimonial"},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
		  $('#uploaded_image').html(data);
        }
      });
    })
  });

});  
</script>
@endpush