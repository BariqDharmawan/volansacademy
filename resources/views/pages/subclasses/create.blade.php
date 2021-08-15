@extends('layouts.admin')
@section('title', 'Tambah Sub Class')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h5 mb-0 text-dark font-weight-bold">Tambah Sub Class Baru untuk Class {{ $class->name }}</h1>
    </div>

	{!! Form::open(array('route' => ['classes.subclasses.store', $class->id],'method'=>'POST', 'files' => true)) !!}
    <div class="card shadow mb-3">
        <div class="card-body">
            <a href="{{ route('classes.show', $class->id) }}" class="btn btn-secondary btn-icon-split">
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
                        <strong>Judul:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Judul','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Sub Judul:</strong>
                        {!! Form::text('sub_name', null, array('placeholder' => 'Sub Judul','class' => 'form-control')) !!}
                    </div>
                </div>
                <!--div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        {!! Form::textArea('description', null, array('placeholder' => 'Description','class' => 'form-control', 'rows' => 3)) !!}
                    </div>
                </div-->
				<!--div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Facilities:</strong>
                        {!! Form::textArea('facilities', null, array('placeholder' => 'Facilities','class' => 'form-control', 'rows' => 3)) !!}
                    </div>
                </div-->
				
				<div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <strong>Price:</strong>
                        {!! Form::number('price', null, array('placeholder' => 'Price','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <strong>Price Discount:</strong>
                        {!! Form::number('price_discount', 0, array('placeholder' => 'Jika price discount diisi maka harga yang dibayar oleh peserta adalah harga ini','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<!--div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
					  <strong>Periode:</strong>

					  <div class="input-group">
						<div class="input-group-prepend">
						  <span class="input-group-text">
							<i class="far fa-calendar-alt"></i>
						  </span>
						</div>
						<input type="text" value="" name="periode" readonly="readonly" style="background:white !important" class="form-control float-right" id="periode">
					  </div>
					  
					</div>
				</div-->
				
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Icon (Cover Sub-Program):</strong>
                        {!! Form::file('icon', null, array('placeholder' => 'Icon','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Inactive:</strong>
                        {!! Form::checkbox('inactive', 1, false) !!}
                    </div>
                </div>
                {!! Form::hidden('external_link', ''); !!}
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner:</strong>
                        {!! Form::file('banner', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail Info Program:</strong>
                        {!! Form::file('detail_info_program', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail Biaya Program:</strong>
                        {!! Form::file('detail_biaya_program', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Garansi Program:</strong>
                        {!! Form::file('garansi_program', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Profesi 1:</strong>
                        {!! Form::file('gambar_profesi_1', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Profesi 2:</strong>
                        {!! Form::file('gambar_profesi_2', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Konfirmasi:</strong>
                        {!! Form::file('banner_konfirmasi', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>DAFTAR SEKARANG 1  (kosongkan jika ingin menghapus tombol):</strong>
                        {!! Form::text('daftar_sekarang_1', null, array('placeholder' => 'Tombol Daftar Sekarang 1','class' => 'form-control')) !!}
                    </div>
                </div>
                {!! Form::hidden('daftar_sekarang_1_link', '') !!}
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Ukuran Font:</strong>
                        {!! Form::number('daftar_sekarang_1_font', null, array('placeholder' => 'Ukuran Font Tombol Daftar Sekarang 1','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Font (HEX):</strong>
                        {!! Form::text('daftar_sekarang_1_warna', null, array('placeholder' => 'Warna Font Tombol Daftar Sekarang 1','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Button (HEX):</strong>
                        {!! Form::text('daftar_sekarang_1_warna_button', null, array('placeholder' => 'Warna Button Tombol Daftar Sekarang 1','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>TOMBOL KONSULTASI:</strong>
                        {!! Form::text('konsultasi', null, array('placeholder' => 'Tombol konsultasi','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Link konsultasi   (kosongkan jika ingin menghapus tombol):</strong>
                        {!! Form::text('konsultasi_link', null, array('placeholder' => 'Link Tombol konsultasi','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Ukuran Font:</strong>
                        {!! Form::number('konsultasi_font', null, array('placeholder' => 'Ukuran Font Tombol konsultasi','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Font (HEX):</strong>
                        {!! Form::text('konsultasi_warna', null, array('placeholder' => 'Warna Font Tombol konsultasi','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Button (HEX):</strong>
                        {!! Form::text('konsultasi_warna_button', null, array('placeholder' => 'Warna Button Tombol konsultasi','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fasilitas Program:</strong>
                        {!! Form::file('fasilitas_program', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fasilitas Bimbel:</strong>
                        {!! Form::file('fasilitas_bimbel', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lokasi Belajar:</strong>
                        {!! Form::file('lokasi_belajar', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Alumni:</strong>
                        {!! Form::file('banner_alumni', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Thumbnail Video Testi Alumni 1:</strong>
                        {!! Form::file('thumbnail_video_alumni_testi_1', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Video Testi Alumni 1 (youtube):</strong>
                        {!! Form::text('video_alumni_testi_1', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Thumbnail Video Testi Alumni 2:</strong>
                        {!! Form::file('thumbnail_video_alumni_testi_2', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Video Testi Alumni 2 (youtube):</strong>
                        {!! Form::text('video_alumni_testi_2', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>DAFTAR SEKARANG 2   (kosongkan jika ingin menghapus tombol):</strong>
                        {!! Form::text('daftar_sekarang_2', null, array('placeholder' => 'Tombol Daftar Sekarang 2','class' => 'form-control')) !!}
                    </div>
                </div>
                {!! Form::hidden('daftar_sekarang_2_link', '') !!}
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Ukuran Font:</strong>
                        {!! Form::number('daftar_sekarang_2_font', null, array('placeholder' => 'Ukuran Font Tombol Daftar Sekarang 2','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Font (HEX):</strong>
                        {!! Form::text('daftar_sekarang_2_warna', null, array('placeholder' => 'Warna Font Tombol Daftar Sekarang 2','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Button (HEX):</strong>
                        {!! Form::text('daftar_sekarang_2_warna_button', null, array('placeholder' => 'Warna Button Tombol Daftar Sekarang 2','class' => 'form-control')) !!}
                    </div>
                </div>
				
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Tagline:</strong>
                        {!! Form::file('banner_tagline', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Slider Foto Alumni:</strong>
                        {!! Form::file('banner_slider_foto_alumni', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Aktifitas Belajar:</strong>
                        {!! Form::file('gambar_aktifitas_belajar', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Slider Chat Alumni:</strong>
                        {!! Form::file('banner_slider_chat_alumni', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Closing:</strong>
                        {!! Form::file('banner_closing', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <strong>Closing Tanggal :</strong>
                        {!! Form::date('expired_date', null, array('placeholder' => 'Ditutup pada','class'
                        => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <strong>Pukul :</strong>
                        {!! Form::time('expired_time', null, array('placeholder' => 'Jam','class'
                        => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="form-group">
                        <strong>Closing Warna Font (HEX):</strong>
                        {!! Form::text('expired_color', null, array('placeholder' => 'Warna font timer','class'
                        => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>DAFTAR SEKARANG 3   (kosongkan jika ingin menghapus tombol):</strong>
                        {!! Form::text('daftar_sekarang_3', null, array('placeholder' => 'Tombol Daftar Sekarang 3','class' => 'form-control')) !!}
                    </div>
                </div>
                {!! Form::hidden('daftar_sekarang_3_link', '') !!}
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Ukuran Font:</strong>
                        {!! Form::number('daftar_sekarang_3_font', null, array('placeholder' => 'Ukuran Font Tombol Daftar Sekarang 3','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Font (HEX):</strong>
                        {!! Form::text('daftar_sekarang_3_warna', null, array('placeholder' => 'Warna Font Tombol Daftar Sekarang 3','class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Warna Button (HEX):</strong>
                        {!! Form::text('daftar_sekarang_3_warna_button', null, array('placeholder' => 'Warna Button Tombol Daftar Sekarang 3','class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="card shadow mb-3">
		<div class="card-header">BANNER UNTUK TAMPILAN MOBILE (SMARTPHONE)</div>
		<div class="card-body">
            <div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner:</strong>
                        {!! Form::file('m_banner', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail Info Program:</strong>
                        {!! Form::file('m_detail_info_program', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail Biaya Program:</strong>
                        {!! Form::file('m_detail_biaya_program', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Garansi Program:</strong>
                        {!! Form::file('m_garansi_program', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Profesi 1:</strong>
                        {!! Form::file('m_gambar_profesi_1', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Profesi 2:</strong>
                        {!! Form::file('m_gambar_profesi_2', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Konfirmasi:</strong>
                        {!! Form::file('m_banner_konfirmasi', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fasilitas Program:</strong>
                        {!! Form::file('m_fasilitas_program', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fasilitas Bimbel:</strong>
                        {!! Form::file('m_fasilitas_bimbel', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lokasi Belajar:</strong>
                        {!! Form::file('m_lokasi_belajar', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Alumni:</strong>
                        {!! Form::file('m_banner_alumni', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Thumbnail Video Testi Alumni 1:</strong>
                        {!! Form::file('m_thumbnail_video_alumni_testi_1', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Thumbnail Video Testi Alumni 2:</strong>
                        {!! Form::file('m_thumbnail_video_alumni_testi_2', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Tagline:</strong>
                        {!! Form::file('m_banner_tagline', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Slider Foto Alumni:</strong>
                        {!! Form::file('m_banner_slider_foto_alumni', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar Aktifitas Belajar:</strong>
                        {!! Form::file('m_gambar_aktifitas_belajar', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Slider Chat Alumni:</strong>
                        {!! Form::file('m_banner_slider_chat_alumni', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Banner Closing:</strong>
                        {!! Form::file('m_banner_closing', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
@endsection

@push('scripts')
<script src="{{ url('AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
    $(function () {
		//Date range picker
		$('#periode').daterangepicker({
			autoUpdateInput: false,
			  locale: {
				  cancelLabel: 'Clear',
				  format: 'DD-MM-YYYY'
			  },
			ignoreReadonly: true,
		});
		
		$('input[name="periode"]').on('apply.daterangepicker', function(ev, picker) {
			  $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
		  });

		  $('input[name="periode"]').on('cancel.daterangepicker', function(ev, picker) {
			  $(this).val('');
		  });
		  
		
		  
	});
</script>
@endpush
@push('styles')
<!-- summernote -->
<link href="{{ url('AdminLTE/plugins/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush